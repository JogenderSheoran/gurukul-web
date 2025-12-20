<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Principal Message | Gurukul Takshshila</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ===== Inner Banner ===== */
        .inner-banner {
            background: #ff8a00;
            padding: 100px 0;
            color: #fff;
            text-align: center;
            position: relative;
        }

        .inner-banner h1 {
            font-weight: 700;
        }

        .breadcrumb {
            justify-content: center;
            background: transparent;
        }

        .breadcrumb-item a {
            color: #fff;
            text-decoration: none;
        }

        /* ===== Message Section ===== */
        .message-card {
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            background: #fff;
            padding: 40px;
        }

        .profile-card {
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            background: #fff;
            padding: 30px;
            text-align: center;
        }

        .profile-card img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .profile-card h5 {
            margin-bottom: 5px;
            font-weight: 700;
        }

        .profile-card span {
            color: #ff8a00;
            font-size: 14px;
        }

        /* ===== Footer ===== */
        .footer {
            background: #1f1f1f;
            color: #ccc;
            padding: 50px 0;
        }

        .footer h6 {
            color: #fff;
            margin-bottom: 20px;
        }

        .footer a {
            color: #ccc;
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
        }

        .footer a:hover {
            color: #ff8a00;
        }

        .footer-bottom {
            background: #111;
            color: #aaa;
            text-align: center;
            padding: 15px 0;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .inner-banner {
                padding: 70px 15px;
            }
        }
    </style>
</head>

<body>

<!-- ===== Inner Banner ===== -->
<section class="inner-banner">
    <div class="container">
        <h1>Principal's Message</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active text-white">Principal Message</li>
            </ol>
        </nav>
    </div>
</section>

<!-- ===== Message Section ===== -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 align-items-start">

            <!-- Left Profile -->
            <div class="col-lg-4">
                <div class="profile-card">
                    <img src="storage/principal/principal.jpg" alt="Principal">
                    <h5>Principal</h5>
                    <span>Gurukul Takshshila</span>
                </div>
            </div>

            <!-- Right Message -->
            <div class="col-lg-8">
                <div class="message-card">
                    <h3 class="fw-bold mb-3">Principal Message</h3>
                    <hr style="width:60px;border:2px solid #ff8a00">

                    <p>
                        It is my great pleasure to welcome you all to Gurukul Takshshila. 
                        Our institution believes in holistic education that nurtures 
                        academic excellence along with moral values.
                    </p>

                    <p>
                        We encourage students to explore, innovate, and develop critical 
                        thinking skills while staying rooted in cultural and ethical values.
                    </p>

                    <p>
                        Our mission is to create confident, responsible, and compassionate 
                        individuals who can contribute meaningfully to society.
                    </p>

                    <p>
                        I invite parents and students to join us on this journey of 
                        knowledge, discipline, and character building.
                    </p>

                    <p class="fw-bold mt-4 mb-0">
                        Warm Regards,<br>
                        Principal<br>
                        Gurukul Takshshila
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Footer -->
@include('frontend.partials.footer')

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


<!-- Road Lines -->
<div class="road-lines"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>