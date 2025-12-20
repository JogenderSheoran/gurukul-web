<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>GoAid Ambulance Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        .hero-banner {
            position: relative;
            background: url('Ambulance-Services-in-Delhi.webp') no-repeat center center;
            background-size: cover; /* ensures image stretches fully */
            height: 100vh; /* make it take full screen height */
            display: flex;
            align-items: center;
            color: white;
        }

        .hero-banner::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5); /* dark overlay */
            z-index: 1;
        }

        .hero-banner .content {
            position: relative;
            z-index: 2;
            padding: 60px;
            width: 60%;
        }

        .hero-banner::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.2); /* 0.5 se kam, to image zyada clear dikhegi */
            z-index: 1;
        }


        @media (max-width: 768px) {
            .hero-banner {
                background-position: center center;
                flex-direction: column;
                text-align: center;
                height: auto;
            }

            .hero-banner .content {
                width: 100%;
                padding: 30px;
            }
        }

    </style>
</head>
<body>

<!-- Navbar -->
@include('frontend.partials.navbar')


<section class="hero-banner" style="background: url('{{ Storage::url($contents['background_image']->value ?? 'uploads/default.jpg') }}') no-repeat center center; background-size: cover;"
>
    <div class="content">
        {!! $contents['hero_heading']->value ?? '' !!}

        {!! $contents['sub_heading']->value ?? '' !!}

        <a href="#" class="btn btn-danger px-4 mb-2">
            {!! $contents['hero_button']->value ?? '' !!}
        </a>

        <a href="tel:8008280020" class="btn btn-danger px-4 mb-2">
            {!! $contents['hero_button2']->value ?? '' !!}
        </a>
    </div>
</section>


<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            {!! $contents['main_heading']->value ?? '<h3 class="fw-bold">Ambulance Services We Offer In Mumbai</h3>' !!}
            {!! $contents['heading_content']->value ?? '<p class="text-muted">GoAid proudly delivers...</p>' !!}
        </div>

        <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center shadow-sm">
                        <img src="{{ Storage::url($service->icon) }}" class="card-img-top mx-auto mt-3" alt="{{ $service->title }}" style="width: 60px;">
                        <div class="card-body">
                            <h6 class="card-title">{{ $service->title }}</h6>
                            <p class="card-text">{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image Column -->
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ Storage::url($contents['image']->value ?? 'uploads/default.jpg') }}" alt="Ambulances" class="img-fluid rounded shadow">
            </div>

            <!-- Text Column -->
            <div class="col-md-6">
                {!! $contents['ambulance_service_heading_content']->value ?? '<h4 class="fw-bold">Ambulance Heading</h4>' !!}
                {!! $contents['ambulance_service_heading_content']->value ?? '<p>Default content goes here.</p>' !!}
            </div>
        </div>
    </div>
</section>


<section class="py-5 bg-light">
    <div class="container">
        <!-- Title and Intro -->
        <div class="text-start mb-5">
            {!! $contents['equipment_main_heading']->value ?? '<h4 class="fw-bold text-primary">Equipment in the Ambulances</h4>' !!}
            {!! $contents['equipment_sub_heading']->value ?? '<p class="text-muted">Default intro text.</p>' !!}
        </div>

        <!-- Equipment Grid -->
        <div class="row g-4">
            @for ($i = 1; $i <= 8; $i++)
                @php
                    $headingKey = "equipment_heading_{$i}";
                    $textKey = "equipment_heading_{$i}_text";
                @endphp

                @if (!empty($contents[$headingKey]) && !empty($contents[$textKey]))
                    <div class="col-md-6">
                        <div class="bg-white p-4 shadow-sm rounded h-100">
                            <h6 class="fw-bold">{!! $contents[$headingKey]->value !!}</h6>
                            <p>{!! $contents[$textKey]->value !!}</p>
                        </div>
                    </div>
                @endif
            @endfor
        </div>
    </div>
</section>

<!-- Section: Anytime, Anywhere 24 Hours Ambulance -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-center gy-4">
            <!-- Text -->
            <div class="col-md-6">
                {!! $contents['anytime_main_heading']->value ?? '<h5 class="fw-bold mb-3">Default Heading</h5>' !!}
                {!! $contents['anytime_ambulance_heading']->value ?? '<p class="mb-3">Default content goes here...</p>' !!}
            </div>

            <!-- Image -->
            <div class="col-md-6 text-center">
                <img src="{{ Storage::url($contents['image']->value ?? 'uploads/default.jpg') }}" alt="Ambulance" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<section class="py-5 text-white" style="background-color: #1e73be;">
    <div class="container py-4">
        <div class="text-center">
            {!! $contents['blue_banner_main_heading']->value ?? '<h4 class="fw-bold mb-4">Default Heading</h4>' !!}

            {!! $contents['paragraph_1']->value ?? '<p class="mb-4">Default paragraph 1</p>' !!}
            {!! $contents['paragraph_2']->value ?? '<p class="mb-4">Default paragraph 2</p>' !!}
            {!! $contents['paragraph_3']->value ?? '<p class="mb-4">Default paragraph 3</p>' !!}
            {!! $contents['paragraph_4']->value ?? '<p class="mb-0">Default paragraph 4</p>' !!}
        </div>
    </div>
</section>


<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5">
            {!! $contents['price_main_heading']->value ?? '<h5 class="fw-bold mb-3">Default Heading</h5>' !!}
            {!! $contents['price_sub_heading']->value ?? '<p class="text-muted">Default pricing description goes here.</p>' !!}
        </div>

        <div class="table-responsive">
            {!! $contents['ambulance_services_content']->value ?? '    ' !!}
        </div>
    </div>
</section>

{{-- <section class="py-5 bg-white">
   <div class="container">
     <!-- Title -->
     <div class="text-center mb-5">
       <h5 class="fw-bold text-uppercase">Our Latest Blogs</h5>
       <p class="text-muted">Read, discover, and enjoy the latest coverage, insights, and true stories from the voices of innovation.</p>
     </div>

     <!-- Blog Cards -->
     <div class="row g-4">
       <!-- Blog 1 -->
       <div class="col-md-4">
         <div class="card h-100 shadow-sm">
           <img src="https://cdn.pixabay.com/photo/2020/05/20/07/16/ambulance-5195305_1280.jpg" class="card-img-top" alt="Blog 1">
           <div class="card-body">
             <h6 class="fw-bold text-danger">Emergency Baby Delivery Ambulance</h6>
             <p class="card-text">Explore how specialized ambulances assist in critical delivery situations, saving both mother and child.</p>
             <a href="#" class="text-danger text-decoration-none fw-semibold">Read More →</a>
           </div>
           <div class="card-footer small text-muted bg-white border-0">
             May 25, 2025 • 12 Comments
           </div>
         </div>
       </div>

       <!-- Blog 2 -->
       <div class="col-md-4">
         <div class="card h-100 shadow-sm">
           <img src="https://cdn.pixabay.com/photo/2020/05/14/20/56/ambulance-5171483_1280.jpg" class="card-img-top" alt="Blog 2">
           <div class="card-body">
             <h6 class="fw-bold text-danger">Why Choose an Online Ambulance Over a Local Ambulance</h6>
             <p class="card-text">A detailed comparison of booking ambulances online vs. locally, with focus on response time, quality, and trust.</p>
             <a href="#" class="text-danger text-decoration-none fw-semibold">Read More →</a>
           </div>
           <div class="card-footer small text-muted bg-white border-0">
             May 20, 2025 • 8 Comments
           </div>
         </div>
       </div>

       <!-- Blog 3 -->
       <div class="col-md-4">
         <div class="card h-100 shadow-sm">
           <img src="https://cdn.pixabay.com/photo/2017/01/31/20/24/ambulance-2025625_1280.jpg" class="card-img-top" alt="Blog 3">
           <div class="card-body">
             <h6 class="fw-bold text-danger">Insurance Reimbursement for Ambulance Bill</h6>
             <p class="card-text">Understand how insurance, ambulance services, and claim processes work together for critical patients.</p>
             <a href="#" class="text-danger text-decoration-none fw-semibold">Read More →</a>
           </div>
           <div class="card-footer small text-muted bg-white border-0">
             May 15, 2025 • 6 Comments
           </div>
         </div>
       </div>
     </div>

     <!-- Pagination -->
     <div class="d-flex justify-content-center mt-4">
       <nav>
         <ul class="pagination pagination-sm mb-0">
           <li class="page-item"><a class="page-link" href="#">1</a></li>
           <li class="page-item"><a class="page-link" href="#">2</a></li>
           <li class="page-item"><a class="page-link" href="#">3</a></li>
           <li class="page-item"><a class="page-link" href="#">4</a></li>
         </ul>
       </nav>
     </div>
   </div>
 </section>--}}
<section class="py-5 bg-light">
    <div class="container">
        <!-- Section Title -->
        <div class="text-center mb-5">
            <h5 class="fw-bold">Our Ambulance Prices Mumbai To Different Cities/Outstation:</h5>
            <p class="text-muted">
                The cost of ambulance service from Mumbai varies based on distance and the type of ambulance. GoAid provides the best and most affordable ambulance service in Mumbai, with transparent ambulance charges per km. If you are also looking
                for a 24/7 ambulance service in Mumbai, then call us now on our helpline number <strong>8008280020</strong> — Our 10-minute ambulance service is always ready.
            </p>
        </div>

        <!-- Pricing Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped bg-white shadow-sm">
                <thead class="table-secondary">
                <tr>
                    <th>Sr. No</th>
                    <th>Route</th>
                    <th>Distance</th>
                    <th>Approx Cost</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Ambulance Service Mumbai to Navi Mumbai</td>
                    <td>21km</td>
                    <td>1900–2400</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ambulance Service Mumbai to Thane</td>
                    <td>25km</td>
                    <td>1900–2600</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Ambulance Service Mumbai to Dombivli</td>
                    <td>43km</td>
                    <td>2600–3000</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Ambulance Service Mumbai to Kalyan</td>
                    <td>44km</td>
                    <td>2600–3000</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Ambulance Service Mumbai to Nagseen</td>
                    <td>60km</td>
                    <td>2600–3000</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Ambulance Service Mumbai to Vasai Virar</td>
                    <td>53km</td>
                    <td>2600–3000</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Ambulance Service Mumbai to Vapi</td>
                    <td>600km</td>
                    <td>2900–3500</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Ambulance Service Mumbai to Malvan</td>
                    <td>635km</td>
                    <td>2900–3800</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Ambulance Service Mumbai to Lonavala</td>
                    <td>85km</td>
                    <td>2900–3800</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Ambulance Service Mumbai to Alibag</td>
                    <td>95km</td>
                    <td>3300–4500</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Ambulance Service Mumbai to Palghar</td>
                    <td>95km</td>
                    <td>3300–4500</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Ambulance Service Mumbai to Igatpuri</td>
                    <td>112km</td>
                    <td>4000–6000</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Ambulance Service Mumbai to Pune</td>
                    <td>184km</td>
                    <td>4500–6500</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Ambulance Service Mumbai to Nashik</td>
                    <td>168km</td>
                    <td>4700–6500</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Ambulance Service Mumbai to Vapi</td>
                    <td>178km</td>
                    <td>4700–6500</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>Ambulance Service Mumbai to Nasari</td>
                    <td>244km</td>
                    <td>7500–8500</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>Ambulance Service Mumbai to Satara</td>
                    <td>295km</td>
                    <td>7500–8500</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<section class="py-5 bg-white">
    <div class="container">
        <!-- Section Title -->
        <div class="mb-5">
            {!! $contents['faq_main_heading']->value ?? '<h5 class="fw-bold text-primary">FAQs</h5>' !!}
        </div>

        <!-- FAQ Accordion -->
        <div class="accordion" id="faqAccordion">
            @for ($i = 1; $i <= 10; $i++)
                @php
                    $questionKey = "question_{$i}";
                    $answerKey = "answer_{$i}";
                @endphp

                @if (!empty($contents[$questionKey]) && !empty($contents[$answerKey]))
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq{{ $i }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}">
                                {!! $contents[$questionKey]->value !!}
                            </button>
                        </h2>
                        <div id="collapse{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {!! $contents[$answerKey]->value !!}
                            </div>
                        </div>
                    </div>
                @endif
            @endfor
        </div>

        <!-- Terms Note -->
        <p class="text-muted mt-4 small">
            {!! $contents['last_heading']->value ?? 'Terms and conditions apply.' !!}
        </p>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <!-- India-wide Locations -->
        {!! $contents['wide_location_main_heading']->value ?? '<h5 class="fw-bold mb-3">Default Heading</h5>' !!}
        {!! $contents['wide_location_heading_text']->value ?? '<p class="text-muted">Default cities text...</p>' !!}

        <!-- Mumbai Localities -->
        {!! $contents['wide_location_heading_2']->value ?? '<h6 class="fw-bold mt-5 mb-3">Default Subheading</h6>' !!}
        {!! $contents['wide_location_heading_2_text']->value ?? '<p class="text-muted">Default Mumbai areas...</p>' !!}
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
