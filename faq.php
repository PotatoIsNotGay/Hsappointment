<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/all.min.css">

    <style>
         .accordion-button {
            background-color: #ffffff;
            color: #090808;
        }
        .accordion-body{
            background-color: #8eb6e8;
        }
        .accordion-item{
            border: none;
        }
    </style>
</head>
<body style="background: linear-gradient(to bottom right, #ffffff 0%, #ffffff 50%, #8eb6e8 50%, #8eb6e8 100%); background-repeat: no-repeat;background-attachment:;
">
<?php include"nav.php"; ?>

    <div class="container py-5">
        <h1 class="display-3 text-center mb-4">FAQs <small class="text-muted">(Frequently Asked Questions)</small></h1>
        <div class="d-flex justify-content-center">
            <hr class="border border-dark border-2 opacity-75 w-75">
        </div>
        <div class="row mt-5">
            <div class="col-lg-8">
                
                
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item  bg-transparent">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed shadow py-4 rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <i class="fa-solid fa-book-medical fs-4 me-2" aria-hidden="true"></i>
                                <i class="fa-solid fa-book-open fs-4 me-2" aria-hidden="true" style="display: none;"></i> What are your visiting hours?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body rounded-bottom">
                                <i class="fa-solid fa-book-open"></i> Our hospital's visiting hours are from [insert visiting hours here]. We understand the importance of having loved ones by your side during your stay, and we strive to accommodate visitors within these designated hours.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mt-5 bg-transparent">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed shadow py-4 rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fa-solid fa-book-medical fs-4 me-2" aria-hidden="true"></i>
                                <i class="fa-solid fa-book-open fs-4 me-2" aria-hidden="true" style="display: none;"></i> Do you offer emergency services?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body rounded-bottom">
                                Yes, our hospital provides 24/7 emergency services. Our dedicated team of medical professionals is ready to assist you in times of urgent medical need. Please don't hesitate to visit our emergency department or call [insert emergency contact number] for immediate assistance.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mt-5 bg-transparent">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed shadow py-4 rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fa-solid fa-book-medical fs-4 me-2" aria-hidden="true"></i>
                                <i class="fa-solid fa-book-open fs-4 me-2" aria-hidden="true" style="display: none;"></i> How can I make an appointment?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body rounded-bottom">
                                Making an appointment at our hospital is easy. You can schedule an appointment by calling our reception at 09-234657896 or by using our online appointment booking system on our website. We offer flexible appointment slots to suit your convenience.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mt-5 bg-transparent">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed shadow py-4 rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <i class="fa-solid fa-book-medical fs-4 me-2" aria-hidden="true"></i>
                                <i class="fa-solid fa-book-open fs-4 me-2" aria-hidden="true" style="display: none;"></i>What insurance plans do you accept?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body rounded-bottom">
                                We accept a wide range of insurance plans to ensure accessibility to quality healthcare for all. Some of the insurance plans we accept include paitent care. If you have any questions regarding insurance coverage or billing, our friendly staff are here to assist you.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex flex-column justify-content-end align-items-md-end">
                <img src="Img/download-removebg-preview (1).png" class="img-fluid mb-3" width="300px" height="500px">
            </div>
            
        </div>
    </div>
    <?php include"footer.php"?>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var accordion = document.getElementById('faqAccordion');
    
        accordion.addEventListener('show.bs.collapse', function (e) {
            var target = e.target;
            var button = target.previousElementSibling.querySelector('.accordion-button');
            button.querySelector('.fa-book-medical').style.display = 'none';
            button.querySelector('.fa-book-open').style.display = 'inline-block';
        });
    
        accordion.addEventListener('hide.bs.collapse', function (e) {
            var target = e.target;
            var button = target.previousElementSibling.querySelector('.accordion-button');
            button.querySelector('.fa-book-medical').style.display = 'inline-block';
            button.querySelector('.fa-book-open').style.display = 'none';
        });
    });
    </script>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
