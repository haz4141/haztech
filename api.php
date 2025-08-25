<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

// Database simulation (in real implementation, use MySQL/PostgreSQL)
$dataFile = 'dashboard_data.json';

// Initialize data file if it doesn't exist
if (!file_exists($dataFile)) {
    $initialData = [
        'bookings' => [],
        'customers' => [],
        'services' => [
            [
                'id' => 1,
                'name' => 'Computer & Networking',
                'basePrice' => 50,
                'perDevice' => 25,
                'urgent' => 1.5,
                'emergency' => 2.5
            ],
            [
                'id' => 2,
                'name' => 'Phone Repairs',
                'basePrice' => 30,
                'perDevice' => 20,
                'urgent' => 1.8,
                'emergency' => 3.0
            ],
            [
                'id' => 3,
                'name' => 'Cybersecurity',
                'basePrice' => 100,
                'perDevice' => 50,
                'urgent' => 1.3,
                'emergency' => 2.0
            ]
        ],
        'stats' => [
            'totalBookings' => 0,
            'pendingServices' => 0,
            'totalRevenue' => 0,
            'activeCustomers' => 0
        ]
    ];
    file_put_contents($dataFile, json_encode($initialData, JSON_PRETTY_PRINT));
}

// Load data
function loadData() {
    global $dataFile;
    return json_decode(file_get_contents($dataFile), true);
}

// Save data
function saveData($data) {
    global $dataFile;
    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
}

// Get request method and action
$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';

try {
    $data = loadData();
    
    switch ($method) {
        case 'GET':
            switch ($action) {
                case 'dashboard':
                    // Calculate stats
                    $stats = [
                        'totalBookings' => count($data['bookings']),
                        'pendingServices' => count(array_filter($data['bookings'], function($b) {
                            return $b['status'] === 'pending';
                        })),
                        'totalRevenue' => array_sum(array_column($data['bookings'], 'cost')),
                        'activeCustomers' => count(array_unique(array_column($data['bookings'], 'customerId')))
                    ];
                    
                    echo json_encode([
                        'success' => true,
                        'stats' => $stats,
                        'recentBookings' => array_slice($data['bookings'], -5)
                    ]);
                    break;
                    
                case 'bookings':
                    echo json_encode([
                        'success' => true,
                        'bookings' => $data['bookings']
                    ]);
                    break;
                    
                case 'customers':
                    echo json_encode([
                        'success' => true,
                        'customers' => $data['customers']
                    ]);
                    break;
                    
                case 'services':
                    echo json_encode([
                        'success' => true,
                        'services' => $data['services']
                    ]);
                    break;
                    
                case 'calculate':
                    $serviceType = $_GET['service'] ?? '';
                    $deviceCount = intval($_GET['devices'] ?? 1);
                    $priority = $_GET['priority'] ?? 'normal';
                    
                    $service = null;
                    foreach ($data['services'] as $s) {
                        if (strtolower($s['name']) === strtolower($serviceType)) {
                            $service = $s;
                            break;
                        }
                    }
                    
                    if ($service) {
                        $basePrice = $service['basePrice'] + ($service['perDevice'] * ($deviceCount - 1));
                        
                        switch ($priority) {
                            case 'urgent':
                                $basePrice *= $service['urgent'];
                                break;
                            case 'emergency':
                                $basePrice *= $service['emergency'];
                                break;
                        }
                        
                        echo json_encode([
                            'success' => true,
                            'cost' => round($basePrice),
                            'breakdown' => [
                                'basePrice' => $service['basePrice'],
                                'perDevice' => $service['perDevice'],
                                'deviceCount' => $deviceCount,
                                'priority' => $priority
                            ]
                        ]);
                    } else {
                        echo json_encode([
                            'success' => false,
                            'error' => 'Service not found'
                        ]);
                    }
                    break;
                    
                default:
                    echo json_encode([
                        'success' => false,
                        'error' => 'Invalid action'
                    ]);
            }
            break;
            
        case 'POST':
            $input = json_decode(file_get_contents('php://input'), true);
            
            switch ($action) {
                case 'booking':
                    // Validate input
                    if (empty($input['customerName']) || empty($input['serviceType'])) {
                        echo json_encode([
                            'success' => false,
                            'error' => 'Missing required fields'
                        ]);
                        exit;
                    }
                    
                    // Create new booking
                    $booking = [
                        'id' => time() . rand(100, 999),
                        'customerName' => $input['customerName'],
                        'email' => $input['email'] ?? '',
                        'serviceType' => $input['serviceType'],
                        'deviceCount' => intval($input['deviceCount'] ?? 1),
                        'priority' => $input['priority'] ?? 'normal',
                        'status' => $input['status'] ?? 'pending',
                        'cost' => floatval($input['cost'] ?? 0),
                        'notes' => $input['notes'] ?? '',
                        'createdAt' => date('Y-m-d H:i:s')
                    ];
                    
                    $data['bookings'][] = $booking;
                    saveData($data);
                    
                    echo json_encode([
                        'success' => true,
                        'booking' => $booking,
                        'message' => 'Booking created successfully'
                    ]);
                    break;
                    
                case 'customer':
                    // Validate input
                    if (empty($input['name']) || empty($input['email'])) {
                        echo json_encode([
                            'success' => false,
                            'error' => 'Missing required fields'
                        ]);
                        exit;
                    }
                    
                    // Create new customer
                    $customer = [
                        'id' => time() . rand(100, 999),
                        'name' => $input['name'],
                        'email' => $input['email'],
                        'phone' => $input['phone'] ?? '',
                        'createdAt' => date('Y-m-d H:i:s')
                    ];
                    
                    $data['customers'][] = $customer;
                    saveData($data);
                    
                    echo json_encode([
                        'success' => true,
                        'customer' => $customer,
                        'message' => 'Customer created successfully'
                    ]);
                    break;
                    
                case 'service':
                    // Validate input
                    if (empty($input['name']) || !isset($input['basePrice'])) {
                        echo json_encode([
                            'success' => false,
                            'error' => 'Missing required fields'
                        ]);
                        exit;
                    }
                    
                    // Create new service
                    $service = [
                        'id' => time() . rand(100, 999),
                        'name' => $input['name'],
                        'basePrice' => floatval($input['basePrice']),
                        'perDevice' => floatval($input['perDevice'] ?? 0),
                        'urgent' => floatval($input['urgent'] ?? 1.5),
                        'emergency' => floatval($input['emergency'] ?? 2.5),
                        'createdAt' => date('Y-m-d H:i:s')
                    ];
                    
                    $data['services'][] = $service;
                    saveData($data);
                    
                    echo json_encode([
                        'success' => true,
                        'service' => $service,
                        'message' => 'Service created successfully'
                    ]);
                    break;
                    
                default:
                    echo json_encode([
                        'success' => false,
                        'error' => 'Invalid action'
                    ]);
            }
            break;
            
        case 'PUT':
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $_GET['id'] ?? '';
            
            if (empty($id)) {
                echo json_encode([
                    'success' => false,
                    'error' => 'ID required'
                ]);
                exit;
            }
            
            switch ($action) {
                case 'booking':
                    // Find and update booking
                    foreach ($data['bookings'] as &$booking) {
                        if ($booking['id'] == $id) {
                            $booking = array_merge($booking, $input);
                            $booking['updatedAt'] = date('Y-m-d H:i:s');
                            saveData($data);
                            
                            echo json_encode([
                                'success' => true,
                                'booking' => $booking,
                                'message' => 'Booking updated successfully'
                            ]);
                            exit;
                        }
                    }
                    
                    echo json_encode([
                        'success' => false,
                        'error' => 'Booking not found'
                    ]);
                    break;
                    
                default:
                    echo json_encode([
                        'success' => false,
                        'error' => 'Invalid action'
                    ]);
            }
            break;
            
        case 'DELETE':
            $id = $_GET['id'] ?? '';
            
            if (empty($id)) {
                echo json_encode([
                    'success' => false,
                    'error' => 'ID required'
                ]);
                exit;
            }
            
            switch ($action) {
                case 'booking':
                    // Find and delete booking
                    foreach ($data['bookings'] as $key => $booking) {
                        if ($booking['id'] == $id) {
                            unset($data['bookings'][$key]);
                            $data['bookings'] = array_values($data['bookings']);
                            saveData($data);
                            
                            echo json_encode([
                                'success' => true,
                                'message' => 'Booking deleted successfully'
                            ]);
                            exit;
                        }
                    }
                    
                    echo json_encode([
                        'success' => false,
                        'error' => 'Booking not found'
                    ]);
                    break;
                    
                default:
                    echo json_encode([
                        'success' => false,
                        'error' => 'Invalid action'
                    ]);
            }
            break;
            
        default:
            echo json_encode([
                'success' => false,
                'error' => 'Method not allowed'
            ]);
    }
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => 'Server error: ' . $e->getMessage()
    ]);
}
?>
