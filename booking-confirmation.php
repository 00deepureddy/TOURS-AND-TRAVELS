<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $vehicle = isset($_POST['vehicle']) ? htmlspecialchars($_POST['vehicle']) : "";
    $pickupLocation = isset($_POST['pickupLocation']) ? htmlspecialchars($_POST['pickupLocation']) : "";
    $dropoffLocation = isset($_POST['dropoffLocation']) ? htmlspecialchars($_POST['dropoffLocation']) : "";
    $pickupDate = isset($_POST['pickupDate']) ? htmlspecialchars($_POST['pickupDate']) : "";
    $pickupTime = isset($_POST['pickupTime']) ? htmlspecialchars($_POST['pickupTime']) : "";
    $dropoffDate = isset($_POST['dropoffDate']) ? htmlspecialchars($_POST['dropoffDate']) : "";
    $dropoffTime = isset($_POST['dropoffTime']) ? htmlspecialchars($_POST['dropoffTime']) : "";
    
    // Validate required fields
    $errors = [];
    
    if (empty($vehicle) || $vehicle == "Select Vehicle") {
        $errors[] = "Please select a vehicle";
    }
    
    if (empty($pickupLocation)) {
        $errors[] = "Pick-up location is required";
    }
    
    if (empty($dropoffLocation)) {
        $errors[] = "Drop-off location is required";
    }
    
    if (empty($pickupDate)) {
        $errors[] = "Pick-up date is required";
    }
    
    if (empty($dropoffDate)) {
        $errors[] = "Drop-off date is required";
    }
    
    // If no errors, proceed with booking
    if (empty($errors)) {
        // Optional: Save booking to database
        // saveBookingToDatabase($vehicle, $pickupLocation, $dropoffLocation, $pickupDate, $pickupTime, $dropoffDate, $dropoffTime);
        
        // Optional: Send confirmation email
        // sendConfirmationEmail($vehicle, $pickupLocation, $dropoffLocation, $pickupDate, $pickupTime, $dropoffDate, $dropoffTime);
        
        // Set success flag
        $bookingSuccess = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <!-- Optional: Include your CSS files here -->
</head>
<body>
    <div class="container">
        <?php if (isset($bookingSuccess) && $bookingSuccess): ?>
            <!-- Booking success message -->
            <div class="confirmation-message" style="background-color: #f8f9fa; border-left: 5px solid #28a745; padding: 20px; margin-top: 20px; border-radius: 5px;">
                <h3 style="color: #28a745; margin-bottom: 15px;">Booking Confirmed!</h3>
                <p>Thank you for your booking. We've received your request with the following details:</p>
                <ul style="list-style: none; padding-left: 0;">
                    <li><strong>Vehicle:</strong> <?php echo $vehicle; ?></li>
                    <li><strong>Pick-up Location:</strong> <?php echo $pickupLocation; ?></li>
                    <li><strong>Drop-off Location:</strong> <?php echo $dropoffLocation; ?></li>
                    <li><strong>Pick-up Date:</strong> <?php echo $pickupDate; ?></li>
                    <li><strong>Pick-up Time:</strong> <?php echo $pickupTime; ?></li>
                    <li><strong>Drop-off Date:</strong> <?php echo $dropoffDate; ?></li>
                    <li><strong>Drop-off Time:</strong> <?php echo $dropoffTime; ?></li>
                </ul>
                <p>Our team will get back to you shortly to confirm your booking.</p>
                <a href="index.php" class="btn btn-light" style="display: inline-block; margin-top: 10px; padding: 8px 16px; text-decoration: none; background-color: #f8f9fa; border: 1px solid #dee2e6; border-radius: 4px; color: #212529;">Make Another Booking</a>
            </div>
        <?php elseif (isset($errors) && !empty($errors)): ?>
            <!-- Error messages -->
            <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 20px; margin-top: 20px; border-radius: 5px;">
                <h3>Please correct the following errors:</h3>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="javascript:history.back()" class="btn btn-outline-danger" style="display: inline-block; margin-top: 10px; padding: 8px 16px; text-decoration: none; background-color: transparent; border: 1px solid #721c24; border-radius: 4px; color: #721c24;">Go Back</a>
            </div>
        <?php else: ?>
            <!-- If someone accesses this page directly without submitting the form -->
            <div class="alert alert-info" style="background-color: #d1ecf1; color: #0c5460; padding: 20px; margin-top: 20px; border-radius: 5px;">
                <p>Please submit the booking form to see the confirmation.</p>
                <a href="index.php" class="btn btn-outline-info" style="display: inline-block; margin-top: 10px; padding: 8px 16px; text-decoration: none; background-color: transparent; border: 1px solid #0c5460; border-radius: 4px; color: #0c5460;">Go to Booking Form</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>