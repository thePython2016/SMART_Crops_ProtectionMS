<?php
// Define Tanzanian regions
$regions = [
    "Arusha", "Dar es Salaam", "Dodoma", "Geita", "Iringa", "Kagera", "Katavi",
    "Kigoma", "Kilimanjaro", "Lindi", "Manyara", "Mara", "Mbeya", "Morogoro",
    "Mtwara", "Mwanza", "Njombe", "Pemba North", "Pemba South", "Pwani",
    "Rukwa", "Ruvuma", "Shinyanga", "Simiyu", "Singida", "Songwe", "Tabora",
    "Tanga", "Zanzibar North", "Zanzibar South and Central", "Zanzibar Urban/West"
];

// OpenWeatherMap API key and URL
$apiKey = "69433d521ca8dacdc8fc31e5d76bc7d1"; // Replace with your actual OpenWeatherMap API key
$apiUrl = "http://api.openweathermap.org/data/2.5/weather";

// Function to fetch weather data using cURL
function getWeather($region, $apiKey, $apiUrl) {
    $url = $apiUrl . "?q=" . urlencode($region) . "&appid=" . $apiKey . "&units=metric";
    
    // Initialize cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    
    if ($response) {
        return json_decode($response, true);
    }
    return null;
}

// Check if a region is selected
$selectedRegion = isset($_POST['region']) ? $_POST['region'] : null;
$weather = null;
$errorMessage = null;

if ($selectedRegion) {
    $weather = getWeather($selectedRegion, $apiKey, $apiUrl);



    if (!$weather || isset($weather['cod']) && $weather['cod'] != 200) {
        $errorMessage = "Sorry, weather data for $selectedRegion is not available.";
   
    }
}

?>