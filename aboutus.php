<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .card {
            transition: all 0.7s; /* Adjust transition duration */
        }

        .card:hover {
            background-color: #38f4cb; /* Change background color on hover */
            transform: scale(1.05); /* Scale effect on hover */
        }
    </style>
</head>
<body>
<?php include"nav.php"; ?>

    <div class="container">
        <p class="h1 display-3 text-center">Hospital Profile</p>
        <div class="d-flex justify-content-center">
            <hr class="border border-dark border-2 opacity-75 w-100">
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 mt-2" data-aos="fade-right">
                <img src="Img/hospital.jpg" alt="" class="w-100 h-100">
            </div>
            <div class="col-lg-6 mt-md-3" data-aos="fade-left">
                <h1>Welcome to <b>Victoria Hospital</b></h1>
                <p class="mt-5 fs-5">At <b>Victoria Hospital</b>, we are dedicated to providing compassionate care and healing to our community. Established in <b>2024</b>, we have been committed to serving our patients with excellence and integrity. Our team of healthcare professionals is comprised of highly skilled doctors, nurses, and support staff who are passionate about improving the health and well-being of our patients. With state-of-the-art facilities and advanced medical technology, we offer comprehensive healthcare services to meet the needs of individuals and families.</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 mb-3 mt-md-3" data-aos="fade-down-right">
                <div class="card h-100" style="background-color: #f1f2f4;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <img src="Img/vision-removebg-preview.png" alt="" class="mx-auto d-block">
                        <h3 class="card-title text-center fw-bold" style="color: #717c7d;">Our Vision</h3>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam officia, quibusdam laboriosam alias cupiditate ipsa consequatur similique, quam, laudantium impedit animi cumque dolorum dolor illum saepe iure delectus deleniti error explicabo quidem nam ut. Asperiores, dicta rerum enim, impedit perferendis quos, deserunt beatae deleniti voluptate nihil repudiandae expedita veniam. Praesentium.</p>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3  mt-md-3" data-aos="fade-down-left">
                <div class="card h-100" style="background-color: #f1f2f4;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <img src="Img/mission-removebg-preview.png" alt="" class="mx-auto d-block" width="200px" height="250px">
                        <h3 class="card-title text-center fw-bold" style="color: #717c7d;">Our Mission</h3>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam officia, quibusdam laboriosam alias cupiditate ipsa consequatur similique, quam, laudantium impedit animi cumque dolorum dolor illum saepe iure delectus deleniti error explicabo quidem nam ut. Asperiores, dicta rerum enim, impedit perferendis quos, deserunt beatae deleniti voluptate nihil repudiandae expedita veniam. Praesentium.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8">
                <p class="display-6 fw-semibold" style="color: #717c7d;" data-aos="fade-down">About Our Service</p>
                <p data-aos="fade-right" class="fs-5">At <b>Victoria Hospital</b>, we are dedicated to providing exceptional healthcare services with compassion and expertise. As a leading healthcare provider in our community, we offer a comprehensive range of medical services designed to meet the diverse needs of our patients.</p>
            </div>
            <div class="col-md-4">
                <img src="Img/patient-removebg-preview.png" class="w-100 h-75" data-aos="fade-left">
            </div>
        </div>
        
    </div>
    <?php include"footer.php"?>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 100, // Adjust the offset value
            duration: 800, // Adjust the duration value
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
