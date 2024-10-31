<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Peys App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Peys App</h2>

    <form method="post" action="">
        <div class="mb-3">
            <label for="size" class="form-label">Select Photo Size:</label>
            <input type="range" class="slider" id="size" name="size" min="10" max="150" value="<?php echo isset($_POST['size']) ? $_POST['size'] : 80; ?>">
        </div>

        <div class="mb-3">
            <label for="borderColor" class="form-label">Select Border Color:</label>
            <input type="color" id="borderColor" name="borderColor" class="form-control form-control-color" value="<?php echo isset($_POST['borderColor']) ? $_POST['borderColor'] : '#000000'; ?>">
        </div>

        <button type="submit" name="process">Process</button>
    </form>

    <div class="photo-container">
        <?php
        $size = isset($_POST['size']) ? (int)$_POST['size'] : 80; 
        $borderColor = isset($_POST['borderColor']) ? $_POST['borderColor'] : '#000000';

        echo "<img src='image.png' alt='Cristian' class='photo' style='width: {$size}px; height: auto; border-color: {$borderColor};'>";
        ?>
    </div>
</div>

<style>
    .container {
        max-width: 400px;
        margin-top: 50px;
        padding: 20px;
        background-color: #e9ecef; 
        border-radius: 12px;
        border: 2px solid #ced4da;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }
    .photo-container {
        text-align: center;
        margin-top: 20px;
    }
    .photo {
        display: block;
        margin: 0 auto;
        border-radius: 8px;
        border-width: 5px;
        border-style: solid;
    }
    h2 {
        text-align: center;
        font-weight: bold;
    }

    /* Button styling */
    button {
        width: 150px;
        height: 60px;
        border: 3px solid #315cfd;
        border-radius: 45px;
        transition: all 0.3s;
        cursor: pointer;
        background: white;
        font-size: 1.2em;
        font-weight: 550;
        display: block;
        margin: 20px auto 0;
    }
    button:hover {
        background: #315cfd;
        color: white;
        font-size: 1.5em;
    }

    /* Slider styling */
    .slider {
        -webkit-appearance: none;
        appearance: none; /* Standard property for compatibility */
        width: 100%;
        height: 10px;
        border-radius: 5px;
        background-color: #4158D0;
        background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
        outline: none;
        opacity: 0.7;
        transition: opacity 0.2s;
    }
    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none; /* Standard property for compatibility */
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #4c00ff;
        background-image: linear-gradient(160deg, #4900f5 0%, #80D0C7 100%);
        cursor: pointer;
    }
    .slider::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #0093E9;
        background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
        cursor: pointer;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
