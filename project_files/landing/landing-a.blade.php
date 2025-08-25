<!DOCTYPE html>
<html lang="ru">
<head>

<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});
var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5D7P4FT');
function gtag(){dataLayer.push(arguments);}
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z5DHTFC2DW"></script>
<script>
window.dataLayer = window.dataLayer || []; gtag('js', new Date()); gtag('config', 'G-Z5DHTFC2DW');
</script>
@php
  $og_url = url()->current();
  $canonical = url()->current();  
  $monthName = [
        '01' => 'січень',
        '02' => 'лютий',
        '03' => 'березень',
        '04' => 'квітень',
        '05' => 'травень',
        '06' => 'червень',
        '07' => 'липень',
        '08' => 'серпень',
        '09' => 'вересень',
        '10' => 'жовтень',
        '11' => 'листопад',
        '12' => 'грудень',
    ];
@endphp
	<meta charset="UTF-8" />
	<title>{{ $data['seo']->seo_title }} | Billboards.com.ua</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="{{ $data['seo']->seo_description }}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	
	<meta name="og:locale" content="uk_UA">
	<meta property="og:image" content="https://billboards.com.ua/assets/img/og/og-image-ua-min.jpg" />
	<meta name="twitter:image:src" content="https://billboards.com.ua/assets/img/og/og-image-ua-min.jpg" />
	<link rel="icon" href="/assets/landing/img/favicon/favicon.ico">
	<link rel="apple-touch-icon" sizes="180x180" href="/assets/landing/img/favicon/apple-touch-icon-180x180.png">
	<!-- Template Basic Images End -->

	<!-- Custom Browsers Color Start -->
	<meta name="theme-color" content="#000">
	<!-- Custom Browsers Color End -->

	<link rel="stylesheet" href="/assets/landing/css/main.min.css?v=20231127-1216">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

	<link rel="canonical" href="{{$canonical}}" />
	 <meta name="robots" content="noindex,nofollow">
</head>

<body>
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5D7P4FT" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- HEADER START -->

	<header class="header">
		<div class="container">
			<div class="header-row">
				<a class="logo">
					<img src="/assets/landing/img/logo.svg" alt="alt">
				</a>
				<div class="logo-text">Зовнішня реклама в Україні</div>
				<div class="header-phones">
					<span class="header-phones__link header-phones__link--1 dropdown-item">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_225_2074)">
								<path
									d="M21.8516 5.62728C21.026 4.28585 19.9384 3.12464 18.6539 2.21306C17.3693 1.30147 15.9142 0.65822 14.3754 0.321746C11.8111 -0.289726 9.11565 -0.0199099 6.72346 1.0877C5.37159 1.68934 4.14762 2.54461 3.11784 3.60719C1.85393 4.88946 0.895816 6.44053 0.31495 8.14472C0.309333 8.16055 0.305244 8.17536 0.300138 8.19119C0.280223 8.25043 0.262354 8.31068 0.243461 8.37094C-0.341731 10.3241 0.205163 11.4031 1.06559 10.4993C1.09929 10.46 1.13401 10.4222 1.16771 10.3839C1.18099 10.368 1.19376 10.3537 1.20653 10.3374C1.96782 9.45037 2.84495 8.66975 3.81435 8.01655C4.22286 7.73196 4.64652 7.46643 5.08533 7.21996C5.57003 6.92828 6.07857 6.67819 6.6055 6.47238C6.75966 6.38512 6.89187 6.26382 6.99204 6.11772C7.09222 5.97161 7.15772 5.80457 7.18355 5.62932L7.19019 5.59409L7.19427 5.57519C7.28495 5.02876 7.55503 4.52809 7.96189 4.15221C8.36874 3.77633 8.88918 3.54666 9.44107 3.49945C9.93266 3.43415 10.4326 3.51384 10.8795 3.72872C11.272 3.91168 11.613 4.18907 11.8721 4.53607C12.1311 4.88306 12.3001 5.28886 12.364 5.71715C12.4609 6.38015 12.3066 7.05543 11.9315 7.6106C11.9111 7.642 11.8891 7.67234 11.8656 7.70149L11.8446 7.72958C11.5361 8.12739 11.1176 8.42601 10.6411 8.58847C10.3592 8.69368 10.062 8.75182 9.76124 8.76055C9.56672 8.77911 9.37046 8.7618 9.18219 8.70949C8.96764 8.66796 8.76089 8.59319 8.56942 8.48787C8.3363 8.38461 8.11705 8.25251 7.91682 8.09468C7.85281 8.0345 7.77409 7.99224 7.68857 7.97213C7.55063 7.94801 7.40865 7.96469 7.28006 8.02013H7.27699C7.23081 8.0403 7.18697 8.06547 7.14627 8.09519C6.76261 8.41485 6.39801 8.75017 6.05248 9.10115C5.30815 9.90297 4.62986 10.7636 4.02422 11.6748C3.83529 11.9781 3.65554 12.2892 3.48499 12.6082C3.32771 12.9044 3.1815 13.2036 3.04635 13.5059C2.82232 14.0107 2.6246 14.5268 2.45401 15.0521L2.42951 15.1282L2.39682 15.2329L2.36618 15.335C1.26474 19.1081 3.24755 21.287 4.90967 19.0116C5.00057 18.8676 5.09333 18.7248 5.18797 18.5832L5.19053 18.5786C6.93231 15.5658 10.5058 13.389 10.5058 13.389C10.7243 13.2501 10.9456 13.1161 11.1696 12.9871L11.2109 12.9641C11.8216 12.6137 12.4525 12.2997 13.1003 12.024C13.6475 11.7703 14.2151 11.5631 14.7972 11.4046C14.991 11.3381 15.1634 11.2207 15.2963 11.0646C15.4292 10.9086 15.5176 10.7196 15.5524 10.5177C15.6354 10.1495 15.8005 9.80491 16.0352 9.50943C16.27 9.21396 16.5683 8.97525 16.9081 8.81111C17.3133 8.60115 17.7667 8.5018 18.2225 8.52311C18.3488 8.51909 18.475 8.53425 18.5968 8.56804C19.2094 8.68614 19.7601 9.01808 20.1506 9.50462C20.541 9.99116 20.7459 10.6006 20.7286 11.2243C20.7113 11.8479 20.473 12.445 20.0561 12.9092C19.6392 13.3733 19.071 13.6742 18.4528 13.7582C18.12 13.8088 17.7805 13.7924 17.4542 13.7098C17.1278 13.6271 16.8213 13.4801 16.5527 13.2772C16.3568 13.1885 16.1445 13.1418 15.9294 13.1398C15.7144 13.1379 15.5012 13.1808 15.3037 13.2659C14.7693 13.5575 14.2539 13.8825 13.7606 14.2392C13.0759 14.7528 12.4299 15.316 11.8278 15.9243C11.2051 16.5677 10.6431 17.2672 10.1488 18.0138L10.0712 18.1354L10.0508 18.1675C9.4508 19.1287 8.9575 20.1525 8.57963 21.2206C8.54695 21.3166 8.51325 21.4126 8.48261 21.5097C8.01384 23.0926 9.0295 23.7253 10.204 23.9546C10.947 24.071 11.7013 24.098 12.4508 24.0348C12.5189 24.029 12.587 24.0225 12.655 24.0154C12.99 23.9745 13.3255 23.9388 13.6574 23.8821C16.1782 23.4618 18.4995 22.2489 20.284 20.4196C22.0686 18.5902 23.2235 16.2396 23.5812 13.7092C24.0115 10.8944 23.3963 8.01942 21.8516 5.62728Z"
									fill="#FFC40C" />
							</g>
							<defs>
								<clipPath id="clip0_225_2074">
									<rect width="24" height="24" fill="white" />
								</clipPath>
							</defs>
						</svg>
						<a href="tel:{{$data['info']->phones[2]}}">{{$data['info']->phones[2]}}</a>
					</span>
					<span class="header-phones__link header-phones__link--2 dropdown-item">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_225_2068)">
								<path
									d="M11.9975 9.21532L11.9907 9.21525C12.1917 9.2139 12.3906 9.1722 12.5761 9.0924C12.7638 9.01178 12.9342 8.89372 13.0777 8.74515C13.2211 8.59657 13.3348 8.42025 13.4122 8.22637C13.4896 8.0325 13.5292 7.82475 13.5287 7.61505V1.74289C13.549 1.52203 13.5242 1.29925 13.4562 1.08881C13.388 0.878385 13.2781 0.684937 13.1333 0.520866C12.9885 0.356795 12.8121 0.225716 12.6153 0.136023C12.4186 0.04633 12.2058 0 11.9907 0C11.7756 0 11.5629 0.04633 11.3661 0.136023C11.1693 0.225716 10.9929 0.356795 10.8481 0.520866C10.7033 0.684937 10.5933 0.878385 10.5253 1.08881C10.4572 1.29925 10.4325 1.52203 10.4526 1.74289V7.61505C10.4522 7.82475 10.4918 8.0325 10.5692 8.22637C10.6466 8.42025 10.7602 8.59657 10.9037 8.74515C11.0471 8.89372 11.2176 9.01178 11.4053 9.0924C11.5909 9.1722 11.7897 9.2139 11.9907 9.21525L11.9839 9.21532H11.9975Z"
									fill="#0087E6" />
								<path
									d="M8.38807 11.9329C8.32633 12.1324 8.22705 12.3175 8.09578 12.4774C7.96451 12.6373 7.80385 12.7688 7.62313 12.8644C7.4424 12.9601 7.24513 13.018 7.04265 13.0347C6.84016 13.0514 6.63646 13.0267 6.44325 12.9621L1.05661 11.1468C0.669738 11.0125 0.349773 10.7264 0.166049 10.3504C-0.0176747 9.97455 -0.0503578 9.5391 0.0750821 9.13852C0.200521 8.73795 0.47398 8.40442 0.836196 8.21032C1.19842 8.01622 1.62023 7.97707 2.01021 8.1015L7.39687 9.91672C7.78727 10.0489 8.11084 10.3354 8.29673 10.7134C8.48255 11.0914 8.51535 11.5299 8.38807 11.9329Z"
									fill="#0087E6" />
								<path
									d="M15.8993 12.4784C15.7678 12.3183 15.6684 12.1328 15.6067 11.9329C15.4803 11.5299 15.5136 11.0918 15.6993 10.714C15.8851 10.3363 16.208 10.0497 16.5979 9.91672L21.988 8.1015C22.3779 7.97707 22.7998 8.01622 23.162 8.21032C23.5242 8.40442 23.7976 8.73795 23.9231 9.13852C24.0486 9.5391 24.0159 9.97455 23.8321 10.3504C23.6484 10.7264 23.3285 11.0125 22.9416 11.1468L17.555 12.9621C17.3615 13.0273 17.1575 13.0524 16.9546 13.0359C16.7518 13.0194 16.5541 12.9616 16.3729 12.866C16.1918 12.7703 16.0309 12.6386 15.8993 12.4784Z"
									fill="#0087E6" />
								<path
									d="M4.61832 23.6807C4.28627 23.4298 4.06397 23.0536 3.99994 22.6343C3.9359 22.215 4.03533 21.7865 4.27652 21.4425L7.60555 16.7088C7.72453 16.5393 7.87472 16.3958 8.04759 16.2863C8.22046 16.1768 8.41261 16.1036 8.61297 16.0709C8.81333 16.0381 9.01799 16.0464 9.21522 16.0955C9.41246 16.1445 9.59835 16.2331 9.76228 16.3563C10.0944 16.6072 10.3166 16.9834 10.3807 17.4027C10.4447 17.8221 10.3453 18.2505 10.1041 18.5946L6.77844 23.3247C6.65917 23.4943 6.50865 23.6379 6.33548 23.7475C6.16232 23.857 5.9699 23.9302 5.76926 23.963C5.56862 23.9957 5.36368 23.9873 5.16619 23.9383C4.96869 23.8893 4.78252 23.8005 4.61832 23.6772V23.6807Z"
									fill="#0087E6" />
								<path
									d="M19.9949 22.6345C19.9308 23.0538 19.7085 23.43 19.3765 23.6809V23.695C19.2126 23.8182 19.0267 23.9069 18.8295 23.9559C18.6322 24.0049 18.4276 24.0132 18.2272 23.9805C18.0268 23.9477 17.8347 23.8745 17.6618 23.765C17.489 23.6556 17.3388 23.512 17.2198 23.3425L13.8908 18.5912C13.7709 18.4218 13.6846 18.2297 13.6367 18.0259C13.5889 17.8221 13.5804 17.6105 13.6119 17.4034C13.6433 17.1961 13.714 16.9974 13.8199 16.8184C13.9258 16.6393 14.0649 16.4836 14.2291 16.36C14.3934 16.2364 14.5797 16.1474 14.7773 16.0981C14.975 16.0487 15.1801 16.04 15.381 16.0724C15.5819 16.1048 15.7746 16.1777 15.9482 16.2869C16.1218 16.3962 16.2728 16.5396 16.3927 16.709L19.7183 21.4427C19.9595 21.7867 20.0589 22.2151 19.9949 22.6345Z"
									fill="#0087E6" />
							</g>
							<defs>
								<clipPath id="clip0_225_2068">
									<rect width="24" height="24" fill="white" />
								</clipPath>
							</defs>
						</svg>
						<a href="tel:{{$data['info']->phones[0]}}">{{$data['info']->phones[0]}}</a>
					</span>
					<span class="header-phones__link header-phones__link--3 dropdown-item">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M2.25 6.75C2.25 15.034 8.966 21.75 17.25 21.75H19.5C20.0967 21.75 20.669 21.5129 21.091 21.091C21.5129 20.669 21.75 20.0967 21.75 19.5V18.128C21.75 17.612 21.399 17.162 20.898 17.037L16.475 15.931C16.035 15.821 15.573 15.986 15.302 16.348L14.332 17.641C14.05 18.017 13.563 18.183 13.122 18.021C11.4849 17.4191 9.99815 16.4686 8.76478 15.2352C7.53141 14.0018 6.58087 12.5151 5.979 10.878C5.817 10.437 5.983 9.95 6.359 9.668L7.652 8.698C8.015 8.427 8.179 7.964 8.069 7.525L6.963 3.102C6.90214 2.85869 6.76172 2.6427 6.56405 2.48834C6.36638 2.33397 6.1228 2.25008 5.872 2.25H4.5C3.90326 2.25 3.33097 2.48705 2.90901 2.90901C2.48705 3.33097 2.25 3.90326 2.25 4.5V6.75Z"
								stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						</svg>

						<a href="tel:{{$data['info']->phones[3]}}" >{{$data['info']->phones[3]}}</a>
					</span>
					<span class="header-phones__link header-phones__link--4 dropdown-item">
						<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_222_2016)">
								<path
									d="M12.5004 25.0008C19.4042 25.0008 25.0008 19.4042 25.0008 12.5004C25.0008 5.59662 19.4042 0 12.5004 0C5.59662 0 0 5.59662 0 12.5004C0 19.4042 5.59662 25.0008 12.5004 25.0008Z"
									fill="#E60000" />
								<path
									d="M12.5974 19.4277C9.18431 19.4389 5.63246 16.5261 5.61723 11.8478C5.60761 8.75373 7.27609 5.77275 9.4096 4.00885C11.4942 2.28585 14.3413 1.18021 16.927 1.17139C17.2597 1.17139 17.6077 1.19785 17.821 1.27C15.56 1.73904 13.7608 3.84288 13.7688 6.22975C13.7686 6.2974 13.7737 6.36495 13.7841 6.4318C17.5668 7.35303 19.2842 9.63888 19.2946 12.7938C19.3051 15.9488 16.8116 19.4133 12.5974 19.4277Z"
									fill="white" />
							</g>
							<defs>
								<clipPath id="clip0_222_2016">
									<rect width="25" height="25" fill="white" />
								</clipPath>
							</defs>
						</svg>
						<a href="tel:{{$data['info']->phones[1]}}" >{{$data['info']->phones[1]}}</a>
					</span>
				</div>
				<span class="phone-toggler">
					<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0_222_2016)">
							<path
								d="M12.5004 25.0008C19.4042 25.0008 25.0008 19.4042 25.0008 12.5004C25.0008 5.59662 19.4042 0 12.5004 0C5.59662 0 0 5.59662 0 12.5004C0 19.4042 5.59662 25.0008 12.5004 25.0008Z"
								fill="#E60000" />
							<path
								d="M12.5974 19.4277C9.18431 19.4389 5.63246 16.5261 5.61723 11.8478C5.60761 8.75373 7.27609 5.77275 9.4096 4.00885C11.4942 2.28585 14.3413 1.18021 16.927 1.17139C17.2597 1.17139 17.6077 1.19785 17.821 1.27C15.56 1.73904 13.7608 3.84288 13.7688 6.22975C13.7686 6.2974 13.7737 6.36495 13.7841 6.4318C17.5668 7.35303 19.2842 9.63888 19.2946 12.7938C19.3051 15.9488 16.8116 19.4133 12.5974 19.4277Z"
								fill="white" />
						</g>
						<defs>
							<clipPath id="clip0_222_2016">
								<rect width="25" height="25" fill="white" />
							</clipPath>
						</defs>
					</svg>
					<a href="tel:{{$data['info']->phones[3]}}">{{$data['info']->phones[3]}}</a>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M16.25 6.875L10 13.125L3.75 6.875" stroke="#3D445C" stroke-width="1.5"
							stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</span>
			</div>
		</div>
	</header>

	<!-- HEADER END -->

	<!-- MAIN CONTENT START -->

	<main class="main">
		<section class="hero">
			<picture>
				<source srcset="/assets/landing/img/hero-img.webp" media="(min-width: 767px)">
				<img src="/assets/landing/img/hero-mobile.webp" alt="MDN" class="hero-bg">
			</picture>
			<div class="container">
				<div class="hero-content">
					<h1 class="h1 white">Розміщення зовнішньої реклами в будь-якій точці України</h1>
					<div class="hero-content__info">
						<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd"
								d="M4.8002 5.40015C3.36425 5.40015 2.2002 6.56421 2.2002 8.00015V17.6001C2.2002 19.0361 3.36426 20.2001 4.8002 20.2001H12.0505V23.8001H9.6002V25.8001H15.0002H16.0002H19.2002H20.2002H22.4002V23.8001H20.2002V20.2001H27.2002C28.6361 20.2001 29.8002 19.0361 29.8002 17.6001V8.00015C29.8002 6.56421 28.6361 5.40015 27.2002 5.40015H4.8002ZM13.5505 23.8001H15.0002V21.6001V20.2001H13.5505V23.8001ZM16.0002 18.2001H15.0002H4.8002C4.46882 18.2001 4.2002 17.9315 4.2002 17.6001V8.00015C4.2002 7.66878 4.46882 7.40015 4.8002 7.40015H27.2002C27.5316 7.40015 27.8002 7.66878 27.8002 8.00015V17.6001C27.8002 17.9315 27.5316 18.2001 27.2002 18.2001H20.2002H19.2002H16.0002ZM17.0002 21.6001V20.2001H18.2002V23.8001H17.0002V21.6001Z"
								fill="#FC6B40" />
						</svg>
						<div class="hero-content__info-text"><span> {{ $total_boards }}</span> актуальних площин по всій країні</div>
					</div>
					<a href="#manager" class="scroll-down btn btn-orange">Замовити консультацію</a>
				</div>
				<div class="features">
					<h3 class="h3 white">Порядок розміщення зовнішньої реклами</h3>
					<div class="features__row">
						<div class="features__item">
							<div class="features__item-top">
								<div class="features__item-top-num">01</div>
								<div class="features__item-top-line"></div>
							</div>
							<div class="features__item-content">
								<div class="features__item-head">Запит</div>
								<p>За Вашим запитом ми підбираємо площини (адресну програму)</p>
							</div>
						</div>
						<div class="features__item">
							<div class="features__item-top">
								<div class="features__item-top-num">02</div>
								<div class="features__item-top-line"></div>
							</div>
							<div class="features__item-content">
								<div class="features__item-head">Узгодження та друк</div>
								<p>Узгоджуємо умови розміщення <br> та макет, забезпечуємо друк постерів</p>
							</div>
						</div>
						<div class="features__item">
							<div class="features__item-top">
								<div class="features__item-top-num">03</div>
								<div class="features__item-top-line"></div>
							</div>
							<div class="features__item-content">
								<div class="features__item-head">Розміщення</div>
								<p>Протягом 3-5 днів постери розміщуються на обраних площинах</p>
							</div>
						</div>
						<div class="features__item">
							<div class="features__item-top">
								<div class="features__item-top-num">04</div>
							</div>
							<div class="features__item-content">
								<div class="features__item-head">Фотозвіт</div>
								<p>Одразу після розміщення Ви отримуєте фотозвіт</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="manager" id="manager">
			<div class="container">
				<div class="manager-row">
					<div class="manager-content">
						<div class="section-label">Зв’язатися з менеджером</div>
						<h2 class="h2">Замовте розміщення реклами прямо зараз, отримайте консультацію менеджера у чаті
						</h2>
					</div>
					<div class="manager-img" style="background: url(/public/assets/img/loading.gif) center center no-repeat;">
						{{--
						<img src="/assets/landing/img/chat.png" alt="alt">
						--}}
                        {{--
						<iframe src="/public/jivo-frame.html" frameborder="0" style="width:100%; height: 463px"></iframe>
                        --}}
					</div>
				</div>
			</div>
		</section>
		<section class="consult">
			<img src="/assets/landing/img/consult-bg.svg" alt="alt" class="consult-bg">
			<div class="container">
				<div class="consult-box">
					<div class="consult-info">
						<img src="/assets/landing/img/consult-arrow.svg" alt="alt" class="consult-box__bg">
						<div class="form-common">
							<h3 class="h3 white">Замовте безкоштовну консультацію, ми Вам зателефонуємо</h3>
							<form action="/" class="form">
								<input type="hidden" name="source" value="Форма 1 landing 1"/>
								<input type="tel" placeholder="+380" name="phone" class="form-input js-phone"
									name="phone">
								<button class="btn btn-black">Замовити консультацію</button>
							</form>
						</div>
					</div>
					<div class="consult-img">
						<img src="/assets/landing/img/form-img-1.webp" alt="alt">
					</div>
				</div>
			</div>
		</section>
		<section class="price">
			<div class="container">
				<div class="price-head">
					<div class="section-label">Вартість</div>
					<h2 class="h2">Вартість розміщення з Billboards.com.ua</h2>
					<p>*Вказано риночні ціни у гривнях з урахуванням ПДВ, станом на {{$monthName['02']}} {{date('Y')}} р.</p>
				</div>
				<div class="price-box">
					<img src="/assets/landing/img/map.svg" alt="alt" class="price-map">
					<div class="tabs">
						<div class="tabs-nav">
							<div class="tabs-nav__btn active">Білборди</div>
							<div class="tabs-nav__btn">Відеоборди</div>
							<div class="tabs-nav__btn">Сітілайти</div>
							<div class="tabs-nav__btn">Скроли</div>
						</div>
						<div class="tabs-content">
							<div class="tabs-content__item">
								<div class="price-header">
									<div class="price-header__item">Міста розміщення</div>
									<div class="price-header__item">Приблизна вартість за місяць, грн.</div>
								</div>
								<div class="price-body-overflow">
									<div class="price-body">
										<div class="price-row">
											<div class="price-row__city">Київ</div>
											<div class="price-row__price">5000-10000</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Харків</div>
											<div class="price-row__price">5000-7000</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Одеса</div>
											<div class="price-row__price">4500-6500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Дніпро</div>
											<div class="price-row__price">7900-9500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Запоріжжя</div>
											<div class="price-row__price">5500-6700</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Львів</div>
											<div class="price-row__price">13000-14000</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Кривий Ріг</div>
											<div class="price-row__price">5500-6500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Миколаїв</div>
											<div class="price-row__price">5000-6000</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Вінниця</div>
											<div class="price-row__price">5500-6700</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Херсон</div>
											<div class="price-row__price">4000-5800</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Чернігів</div>
											<div class="price-row__price">5000-6200</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Полтава</div>
											<div class="price-row__price">5000- 6500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Хмельницький</div>
											<div class="price-row__price">4800- 6000</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Черкаси</div>
											<div class="price-row__price">4800- 5800</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Чернівці</div>
											<div class="price-row__price">5000-6000</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Житомир </div>
											<div class="price-row__price">4500-5800</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Суми
											</div>
											<div class="price-row__price">4500-5800</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Рівне</div>
											<div class="price-row__price">5000-6000</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Івано-Франківськ</div>
											<div class="price-row__price">5000-6000</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Кропивницький </div>
											<div class="price-row__price">4500-5800</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Тернопіль</div>
											<div class="price-row__price">4500-5900</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Луцьк</div>
											<div class="price-row__price">5500-7500</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs-content__item">
								<div class="price-header">
									<div class="price-header__item">Міста розміщення</div>
									<div class="price-header__item">Приблизна вартість за місяць, грн.</div>
								</div>
								<div class="price-body-overflow">
									<div class="price-body">
										<div class="price-row">
											<div class="price-row__city">Київ</div>
											<div class="price-row__price">5500-12900</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Харків</div>
											<div class="price-row__price">5500-6500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Одеса</div>
											<div class="price-row__price">5500-6500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Запоріжжя</div>
											<div class="price-row__price">8000</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Миколаїв</div>
											<div class="price-row__price">6000</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Вінниця</div>
											<div class="price-row__price">6000</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs-content__item">
								<div class="price-header">
									<div class="price-header__item">Міста розміщення</div>
									<div class="price-header__item">Приблизна вартість за місяць, грн.</div>
								</div>
								<div class="price-body-overflow">
									<div class="price-body">
										<div class="price-row">
											<div class="price-row__city">Київ</div>
											<div class="price-row__price">3500-5500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Харків</div>
											<div class="price-row__price">3000-4900</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Одеса</div>
											<div class="price-row__price">3500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Дніпро</div>
											<div class="price-row__price">3700</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Запоріжжя</div>
											<div class="price-row__price">3700</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Львів</div>
											<div class="price-row__price">4000-6000</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Кривий Ріг</div>
											<div class="price-row__price">3500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Миколаїв</div>
											<div class="price-row__price">3000</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Вінниця</div>
											<div class="price-row__price">3200</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Херсон</div>
											<div class="price-row__price">2500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Чернігів</div>
											<div class="price-row__price">3500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Полтава</div>
											<div class="price-row__price">2900</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Хмельницький</div>
											<div class="price-row__price">3200</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Черкаси</div>
											<div class="price-row__price">2700</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Чернівці</div>
											<div class="price-row__price">3300</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Житомир</div>
											<div class="price-row__price">3300</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Суми
											</div>
											<div class="price-row__price">2800</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Рівне</div>
											<div class="price-row__price">3500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Івано-Франківськ</div>
											<div class="price-row__price">3500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Кропивницький </div>
											<div class="price-row__price">2800</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Тернопіль</div>
											<div class="price-row__price">3300</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Луцьк</div>
											<div class="price-row__price">3300</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs-content__item">
								<div class="price-header">
									<div class="price-header__item">Міста розміщення</div>
									<div class="price-header__item">Приблизна вартість за місяць, грн.</div>
								</div>
								<div class="price-body-overflow">
									<div class="price-body">
										<div class="price-row">
											<div class="price-row__city">Київ</div>
											<div class="price-row__price">6500-8500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Харків</div>
											<div class="price-row__price">6500-7500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Одеса</div>
											<div class="price-row__price">5500-5900</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Дніпро</div>
											<div class="price-row__price">7500-8500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Запоріжжя</div>
											<div class="price-row__price">5500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Львів</div>
											<div class="price-row__price">10500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Вінниця</div>
											<div class="price-row__price">5900</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Херсон</div>
											<div class="price-row__price">5200</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Чернігів</div>
											<div class="price-row__price">5500</div>
										</div>

										<div class="price-row">
											<div class="price-row__city">Чернівці</div>
											<div class="price-row__price">5500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Житомир</div>
											<div class="price-row__price">5500</div>
										</div>
										<div class="price-row">
											<div class="price-row__city">Луцьк</div>
											<div class="price-row__price">6800</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="price-total">
					<h4 class="h4">*Додаткові послуги</h4>
					<div class="price-total__table">
						<div class="price-total__table-row">
							<div class="price-total__table-text">Друк постера для білборда 3Х6м</div>
							<div class="price-total__table-dots"></div>
							<div class="price-total__table-price">840 грн.</div>
						</div>
						<div class="price-total__table-row">
							<div class="price-total__table-text">Друк постера для стілайта</div>
							<div class="price-total__table-dots"></div>
							<div class="price-total__table-price">500 грн.</div>
						</div>
						<div class="price-total__table-row">
							<div class="price-total__table-text">Послуги дизайнера з розробки постера для білборду та
								сітілайту</div>
							<div class="price-total__table-dots"></div>
							<div class="price-total__table-price">
								1000 грн.</div>
						</div>
					</div>
				</div>
				<div class="price-map-mob">
					<img src="/assets/landing/img/map.svg" alt="alt">
				</div>
			</div>
		</section>
		<section class="cons">
			<div class="cons-row">
				<div class="cons-img">
					<img src="/assets/landing/img/cons-img-1.webp" alt="alt">
				</div>
				<div class="cons-content">
					<img src="/assets/landing/img/cons-bg-1.svg" alt="alt" class="cons-content__bg cons-content__bg--1">
					<img src="/assets/landing/img/cons-bg-2.svg" alt="alt" class="cons-content__bg cons-content__bg--2">
					<div class="form-common">
						<h3 class="h3 white">Залиште номер телефону, та отримайте безкоштовну консультацію менеджера
						</h3>
						<form action="/" class="form">
							<input type="hidden" name="source" value="Форма 2 landing 1"/>
							<input type="tel" placeholder="+380" class="form-input js-phone" name="phone">
							<button class="btn btn-orange">Замовити консультацію</button>
						</form>
					</div>
				</div>
			</div>
		</section>
		<section class="brands">
			<div class="container">
				<h2 class="h2">Нам довіряють розміщення реклами</h2>
			</div>
			<div class="brands-wrap">
				<div class="brands-slider">
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-1.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-2.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-3.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-4.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-5.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-6.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-7.webp" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-8.webp" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-9.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-10.webp" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-11.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-12.webp" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-13.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-14.webp" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-1.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-2.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-3.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-4.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-5.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-6.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-7.webp" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-8.webp" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-9.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-10.webp" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-11.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-12.webp" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-13.svg" alt="alt">
					</div>
					<div class="brands-slide">
						<img src="/assets/landing/img/brand-14.webp" alt="alt">
					</div>
				</div>
			</div>
		</section>
		<section class="reviews">
			<div class="container">
				<div class="section-label">Відгуки</div>
				<div class="reviews-header">
					<h2 class="h2">Клієнти про Billboards.com.ua</h2>
					<div class="slider-nav">
						<div class="slider-nav__arrow slider-nav__prev">
							<svg width="8" height="14" viewBox="0 0 8 14" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M7.53033 0.46967C7.23744 0.176777 6.76256 0.176777 6.46967 0.46967L0.46967 6.46967C0.176777 6.76256 0.176777 7.23744 0.46967 7.53033L6.46967 13.5303C6.76256 13.8232 7.23744 13.8232 7.53033 13.5303C7.82322 13.2374 7.82322 12.7626 7.53033 12.4697L2.06066 7L7.53033 1.53033C7.82322 1.23744 7.82322 0.762563 7.53033 0.46967Z"
									fill="#FC6B40" />
							</svg>
						</div>
						<div class="slider-nav__arrow slider-nav__next">
							<svg width="8" height="14" viewBox="0 0 8 14" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M7.53033 0.46967C7.23744 0.176777 6.76256 0.176777 6.46967 0.46967L0.46967 6.46967C0.176777 6.76256 0.176777 7.23744 0.46967 7.53033L6.46967 13.5303C6.76256 13.8232 7.23744 13.8232 7.53033 13.5303C7.82322 13.2374 7.82322 12.7626 7.53033 12.4697L2.06066 7L7.53033 1.53033C7.82322 1.23744 7.82322 0.762563 7.53033 0.46967Z"
									fill="#FC6B40" />
							</svg>
						</div>
					</div>
				</div>
				<div class="reviews-slider">
					@foreach($reviews as $item)
					<div class="reviews-slide">
						<div class="reviews-item">
							<div class="reviews-item__info">
								<div class="reviews-item__logo">
									<img src="{{ asset($item->avatar) }}" alt="alt">
								</div>
								<div class="reviews-item__info-content">
									<div class="reviews-item__name">{{ $item->getTranslatedAttribute('name') }}</div>
									<!--
									<div class="reviews-item__job">НАЧАЛЬНИК ВІДДІЛУ ECOMMERCE І МАРКЕТИНГУ, LEO
										EXSPRESS</div>
									-->
								</div>
							</div>
							<div class="reviews-item__content">
								<div class="reviews-item__text">{{ $item->getTranslatedAttribute('text') }}</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
		<section class="contacts">
			<div class="container">
				<div class="contacts-box">
					<div class="form-common">
						<h3 class="h3 white">Хочу отримати безкоштовну консультацію, зателефонуйте мені
						</h3>
						<form action="/" class="form">
							<input type="hidden" name="source" value="Форма 3 landing 1"/>
							<input type="tel" placeholder="+380" class="form-input js-phone" name="phone">
							<button class="btn btn-black">Замовити консультацію</button>
						</form>
					</div>
					<img src="/assets/landing/img/girl-dekstop.webp" alt="alt" class="contacts-girl contacts-girl--desktop">
					<img src="/assets/landing/img/girl-mobile.webp" alt="alt" class="contacts-girl contacts-girl--mobile">
				</div>
			</div>
		</section>
	</main>

	<!-- MAIN CONTENT  END -->

	<!-- FOOTER START -->

	<footer class="footer">
		<div class="footer-top">
			<div class="container">
				<div class="footer-top__row">
					<div class="footer-top__info">
						<div class="footer-logo">
							<img src="/assets/landing/img/footer-logo.svg" alt="alt">
						</div>
						<div class="footer-phones">
							<span class="header-phones__link header-phones__link--1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0_225_2074)">
										<path
											d="M21.8516 5.62728C21.026 4.28585 19.9384 3.12464 18.6539 2.21306C17.3693 1.30147 15.9142 0.65822 14.3754 0.321746C11.8111 -0.289726 9.11565 -0.0199099 6.72346 1.0877C5.37159 1.68934 4.14762 2.54461 3.11784 3.60719C1.85393 4.88946 0.895816 6.44053 0.31495 8.14472C0.309333 8.16055 0.305244 8.17536 0.300138 8.19119C0.280223 8.25043 0.262354 8.31068 0.243461 8.37094C-0.341731 10.3241 0.205163 11.4031 1.06559 10.4993C1.09929 10.46 1.13401 10.4222 1.16771 10.3839C1.18099 10.368 1.19376 10.3537 1.20653 10.3374C1.96782 9.45037 2.84495 8.66975 3.81435 8.01655C4.22286 7.73196 4.64652 7.46643 5.08533 7.21996C5.57003 6.92828 6.07857 6.67819 6.6055 6.47238C6.75966 6.38512 6.89187 6.26382 6.99204 6.11772C7.09222 5.97161 7.15772 5.80457 7.18355 5.62932L7.19019 5.59409L7.19427 5.57519C7.28495 5.02876 7.55503 4.52809 7.96189 4.15221C8.36874 3.77633 8.88918 3.54666 9.44107 3.49945C9.93266 3.43415 10.4326 3.51384 10.8795 3.72872C11.272 3.91168 11.613 4.18907 11.8721 4.53607C12.1311 4.88306 12.3001 5.28886 12.364 5.71715C12.4609 6.38015 12.3066 7.05543 11.9315 7.6106C11.9111 7.642 11.8891 7.67234 11.8656 7.70149L11.8446 7.72958C11.5361 8.12739 11.1176 8.42601 10.6411 8.58847C10.3592 8.69368 10.062 8.75182 9.76124 8.76055C9.56672 8.77911 9.37046 8.7618 9.18219 8.70949C8.96764 8.66796 8.76089 8.59319 8.56942 8.48787C8.3363 8.38461 8.11705 8.25251 7.91682 8.09468C7.85281 8.0345 7.77409 7.99224 7.68857 7.97213C7.55063 7.94801 7.40865 7.96469 7.28006 8.02013H7.27699C7.23081 8.0403 7.18697 8.06547 7.14627 8.09519C6.76261 8.41485 6.39801 8.75017 6.05248 9.10115C5.30815 9.90297 4.62986 10.7636 4.02422 11.6748C3.83529 11.9781 3.65554 12.2892 3.48499 12.6082C3.32771 12.9044 3.1815 13.2036 3.04635 13.5059C2.82232 14.0107 2.6246 14.5268 2.45401 15.0521L2.42951 15.1282L2.39682 15.2329L2.36618 15.335C1.26474 19.1081 3.24755 21.287 4.90967 19.0116C5.00057 18.8676 5.09333 18.7248 5.18797 18.5832L5.19053 18.5786C6.93231 15.5658 10.5058 13.389 10.5058 13.389C10.7243 13.2501 10.9456 13.1161 11.1696 12.9871L11.2109 12.9641C11.8216 12.6137 12.4525 12.2997 13.1003 12.024C13.6475 11.7703 14.2151 11.5631 14.7972 11.4046C14.991 11.3381 15.1634 11.2207 15.2963 11.0646C15.4292 10.9086 15.5176 10.7196 15.5524 10.5177C15.6354 10.1495 15.8005 9.80491 16.0352 9.50943C16.27 9.21396 16.5683 8.97525 16.9081 8.81111C17.3133 8.60115 17.7667 8.5018 18.2225 8.52311C18.3488 8.51909 18.475 8.53425 18.5968 8.56804C19.2094 8.68614 19.7601 9.01808 20.1506 9.50462C20.541 9.99116 20.7459 10.6006 20.7286 11.2243C20.7113 11.8479 20.473 12.445 20.0561 12.9092C19.6392 13.3733 19.071 13.6742 18.4528 13.7582C18.12 13.8088 17.7805 13.7924 17.4542 13.7098C17.1278 13.6271 16.8213 13.4801 16.5527 13.2772C16.3568 13.1885 16.1445 13.1418 15.9294 13.1398C15.7144 13.1379 15.5012 13.1808 15.3037 13.2659C14.7693 13.5575 14.2539 13.8825 13.7606 14.2392C13.0759 14.7528 12.4299 15.316 11.8278 15.9243C11.2051 16.5677 10.6431 17.2672 10.1488 18.0138L10.0712 18.1354L10.0508 18.1675C9.4508 19.1287 8.9575 20.1525 8.57963 21.2206C8.54695 21.3166 8.51325 21.4126 8.48261 21.5097C8.01384 23.0926 9.0295 23.7253 10.204 23.9546C10.947 24.071 11.7013 24.098 12.4508 24.0348C12.5189 24.029 12.587 24.0225 12.655 24.0154C12.99 23.9745 13.3255 23.9388 13.6574 23.8821C16.1782 23.4618 18.4995 22.2489 20.284 20.4196C22.0686 18.5902 23.2235 16.2396 23.5812 13.7092C24.0115 10.8944 23.3963 8.01942 21.8516 5.62728Z"
											fill="#FFC40C" />
									</g>
									<defs>
										<clipPath id="clip0_225_2074">
											<rect width="24" height="24" fill="white" />
										</clipPath>
									</defs>
								</svg>
								<a href="tel:{{$data['info']->phones[2]}}">{{$data['info']->phones[2]}}</a>
							</span>
							<span class="header-phones__link header-phones__link--4">
								<svg width="25" height="25" viewBox="0 0 25 25" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0_222_2016)">
										<path
											d="M12.5004 25.0008C19.4042 25.0008 25.0008 19.4042 25.0008 12.5004C25.0008 5.59662 19.4042 0 12.5004 0C5.59662 0 0 5.59662 0 12.5004C0 19.4042 5.59662 25.0008 12.5004 25.0008Z"
											fill="#E60000" />
										<path
											d="M12.5974 19.4277C9.18431 19.4389 5.63246 16.5261 5.61723 11.8478C5.60761 8.75373 7.27609 5.77275 9.4096 4.00885C11.4942 2.28585 14.3413 1.18021 16.927 1.17139C17.2597 1.17139 17.6077 1.19785 17.821 1.27C15.56 1.73904 13.7608 3.84288 13.7688 6.22975C13.7686 6.2974 13.7737 6.36495 13.7841 6.4318C17.5668 7.35303 19.2842 9.63888 19.2946 12.7938C19.3051 15.9488 16.8116 19.4133 12.5974 19.4277Z"
											fill="white" />
									</g>
									<defs>
										<clipPath id="clip0_222_2016">
											<rect width="25" height="25" fill="white" />
										</clipPath>
									</defs>
								</svg>
								<a href="tel:{{$data['info']->phones[0]}}" >{{$data['info']->phones[0]}}</a>
							</span>
							<span class="header-phones__link header-phones__link--3">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M2.25 6.75C2.25 15.034 8.966 21.75 17.25 21.75H19.5C20.0967 21.75 20.669 21.5129 21.091 21.091C21.5129 20.669 21.75 20.0967 21.75 19.5V18.128C21.75 17.612 21.399 17.162 20.898 17.037L16.475 15.931C16.035 15.821 15.573 15.986 15.302 16.348L14.332 17.641C14.05 18.017 13.563 18.183 13.122 18.021C11.4849 17.4191 9.99815 16.4686 8.76478 15.2352C7.53141 14.0018 6.58087 12.5151 5.979 10.878C5.817 10.437 5.983 9.95 6.359 9.668L7.652 8.698C8.015 8.427 8.179 7.964 8.069 7.525L6.963 3.102C6.90214 2.85869 6.76172 2.6427 6.56405 2.48834C6.36638 2.33397 6.1228 2.25008 5.872 2.25H4.5C3.90326 2.25 3.33097 2.48705 2.90901 2.90901C2.48705 3.33097 2.25 3.90326 2.25 4.5V6.75Z"
										stroke="white" stroke-width="1.5" stroke-linecap="round"
										stroke-linejoin="round" />
								</svg>
								<a href="tel:{{$data['info']->phones[3]}}">{{$data['info']->phones[3]}}</a>
							</span>
							<span class="header-phones__link header-phones__link--2">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0_225_2068)">
										<path
											d="M11.9975 9.21532L11.9907 9.21525C12.1917 9.2139 12.3906 9.1722 12.5761 9.0924C12.7638 9.01178 12.9342 8.89372 13.0777 8.74515C13.2211 8.59657 13.3348 8.42025 13.4122 8.22637C13.4896 8.0325 13.5292 7.82475 13.5287 7.61505V1.74289C13.549 1.52203 13.5242 1.29925 13.4562 1.08881C13.388 0.878385 13.2781 0.684937 13.1333 0.520866C12.9885 0.356795 12.8121 0.225716 12.6153 0.136023C12.4186 0.04633 12.2058 0 11.9907 0C11.7756 0 11.5629 0.04633 11.3661 0.136023C11.1693 0.225716 10.9929 0.356795 10.8481 0.520866C10.7033 0.684937 10.5933 0.878385 10.5253 1.08881C10.4572 1.29925 10.4325 1.52203 10.4526 1.74289V7.61505C10.4522 7.82475 10.4918 8.0325 10.5692 8.22637C10.6466 8.42025 10.7602 8.59657 10.9037 8.74515C11.0471 8.89372 11.2176 9.01178 11.4053 9.0924C11.5909 9.1722 11.7897 9.2139 11.9907 9.21525L11.9839 9.21532H11.9975Z"
											fill="#0087E6" />
										<path
											d="M8.38807 11.9329C8.32633 12.1324 8.22705 12.3175 8.09578 12.4774C7.96451 12.6373 7.80385 12.7688 7.62313 12.8644C7.4424 12.9601 7.24513 13.018 7.04265 13.0347C6.84016 13.0514 6.63646 13.0267 6.44325 12.9621L1.05661 11.1468C0.669738 11.0125 0.349773 10.7264 0.166049 10.3504C-0.0176747 9.97455 -0.0503578 9.5391 0.0750821 9.13852C0.200521 8.73795 0.47398 8.40442 0.836196 8.21032C1.19842 8.01622 1.62023 7.97707 2.01021 8.1015L7.39687 9.91672C7.78727 10.0489 8.11084 10.3354 8.29673 10.7134C8.48255 11.0914 8.51535 11.5299 8.38807 11.9329Z"
											fill="#0087E6" />
										<path
											d="M15.8993 12.4784C15.7678 12.3183 15.6684 12.1328 15.6067 11.9329C15.4803 11.5299 15.5136 11.0918 15.6993 10.714C15.8851 10.3363 16.208 10.0497 16.5979 9.91672L21.988 8.1015C22.3779 7.97707 22.7998 8.01622 23.162 8.21032C23.5242 8.40442 23.7976 8.73795 23.9231 9.13852C24.0486 9.5391 24.0159 9.97455 23.8321 10.3504C23.6484 10.7264 23.3285 11.0125 22.9416 11.1468L17.555 12.9621C17.3615 13.0273 17.1575 13.0524 16.9546 13.0359C16.7518 13.0194 16.5541 12.9616 16.3729 12.866C16.1918 12.7703 16.0309 12.6386 15.8993 12.4784Z"
											fill="#0087E6" />
										<path
											d="M4.61832 23.6807C4.28627 23.4298 4.06397 23.0536 3.99994 22.6343C3.9359 22.215 4.03533 21.7865 4.27652 21.4425L7.60555 16.7088C7.72453 16.5393 7.87472 16.3958 8.04759 16.2863C8.22046 16.1768 8.41261 16.1036 8.61297 16.0709C8.81333 16.0381 9.01799 16.0464 9.21522 16.0955C9.41246 16.1445 9.59835 16.2331 9.76228 16.3563C10.0944 16.6072 10.3166 16.9834 10.3807 17.4027C10.4447 17.8221 10.3453 18.2505 10.1041 18.5946L6.77844 23.3247C6.65917 23.4943 6.50865 23.6379 6.33548 23.7475C6.16232 23.857 5.9699 23.9302 5.76926 23.963C5.56862 23.9957 5.36368 23.9873 5.16619 23.9383C4.96869 23.8893 4.78252 23.8005 4.61832 23.6772V23.6807Z"
											fill="#0087E6" />
										<path
											d="M19.9949 22.6345C19.9308 23.0538 19.7085 23.43 19.3765 23.6809V23.695C19.2126 23.8182 19.0267 23.9069 18.8295 23.9559C18.6322 24.0049 18.4276 24.0132 18.2272 23.9805C18.0268 23.9477 17.8347 23.8745 17.6618 23.765C17.489 23.6556 17.3388 23.512 17.2198 23.3425L13.8908 18.5912C13.7709 18.4218 13.6846 18.2297 13.6367 18.0259C13.5889 17.8221 13.5804 17.6105 13.6119 17.4034C13.6433 17.1961 13.714 16.9974 13.8199 16.8184C13.9258 16.6393 14.0649 16.4836 14.2291 16.36C14.3934 16.2364 14.5797 16.1474 14.7773 16.0981C14.975 16.0487 15.1801 16.04 15.381 16.0724C15.5819 16.1048 15.7746 16.1777 15.9482 16.2869C16.1218 16.3962 16.2728 16.5396 16.3927 16.709L19.7183 21.4427C19.9595 21.7867 20.0589 22.2151 19.9949 22.6345Z"
											fill="#0087E6" />
									</g>
									<defs>
										<clipPath id="clip0_225_2068">
											<rect width="24" height="24" fill="white" />
										</clipPath>
									</defs>
								</svg>
								<a href="tel:{{$data['info']->phones[1]}}">{{$data['info']->phones[1]}}</a>
							</span>
						</div>
					</div>
					<div class="footer-top__seo">
						<p>Billboards.com.ua - створений для того, щоб ви могли швидко та ефективно спланувати та
							розмістити зовнішню рекламу будь-якого виду. База існуючих і орендованих конструкцій, які ви
							можете орендувати (борди, лайтбокси, скролери, призми і т.п.) постійно оновлюється і
							розширюється. </p>
						<p>Щоб отримати доступ до повного функціоналу Billboards.com.ua, потрібно зареєструватися. Це
							можна зробити самостійно в спеціальній формі на сайті, або зробивши запит менеджеру. Щоб
							орендувати площини, потрібно підписати стандартний договір, який буде надано менеджером. 
							Вартість розраховується індивідуально для кожного типу носія, в залежності від його місця
							розташування, та терміну розміщення реклами.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom__row">
					<div class="copyright">© <?=date('Y')?>. All rights reserved.</div>
					{{--<a href="#" class="footer-link">Угода користувача</a>--}}
				</div>
			</div>
		</div>
	</footer>

	<!-- FOOTER END -->

	<!-- MODAL -->

	<div class="modal mfp-hide" id="modalThanks">
		<div class="modal-logo">
			<a href="https://billboards.com.ua/ua" class="logo" target="_blank">
				<img src="/assets/landing/img/logo.svg" alt="alt">
			</a>
		</div>
		<div class="modal-close">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path
					d="M4.69398 19.119L4.58792 19.225L4.69398 19.3311L5.54251 20.1796L5.64858 20.2857L5.75464 20.1796L12.4368 13.4975L19.119 20.1796L19.225 20.2857L19.3311 20.1796L20.1796 19.3311L20.2857 19.225L20.1796 19.119L13.4975 12.4368L20.1796 5.75464L20.2857 5.64858L20.1796 5.54251L19.3311 4.69398L19.225 4.58792L19.119 4.69398L12.4368 11.3761L5.75464 4.69398L5.64858 4.58792L5.54251 4.69398L4.69398 5.54251L4.58792 5.64858L4.69398 5.75464L11.3761 12.4368L4.69398 19.119Z"
					fill="#3D445C" stroke="#3D445C" stroke-width="0.3" />
			</svg>
		</div>
		<div class="modal-thanks">
			<div class="modal-thanks__img">
				<img src="/assets/landing/img/thanks.svg" alt="alt">
			</div>
			<div class="modal-thanks__content">
				<div class="modal-thanks__head">Дякуємо!</div>
				<p>Наш менеджер зв'яжеться з вами найближчим часом</p>
			</div>
		</div>
	</div>

	<!-- COMPONENTS -->

	<script src="/assets/landing/js/scripts.min.js"></script>
	<script src="/assets/landing/js/common.js?t=20231201-1"></script>
{{--
<style>
.manager-img > jdiv{
	position:relative;
	/*width: 631px;*/
	height: 463px;
	width:100%;
	/*height:100%;*/
	display:block;
}
.manager-img jdiv[class^="mobileContainer"]{
	position:relative !important;
	width: 100% !important;
	height: 100% !important;
}
</style>
--}}
<!--------------------------------------------------------------AHTUNG---------------------------------------------------------------->
	<!-- Begin of Chaport Live Chat code -->
	<script type="text/javascript">
		(function(w,d,v3){
			const appearanceText = typeof al_jivosite_text != 'undefined' ? al_jivosite_text : 'Вітаю! Допомогти вам вибрати гарні рекламні площини?';
			w.chaportConfig = {
				appId: '659bd13ae1115f13fadd77ab',
				launcher:{
					show: true
				},
				appearance: {
					onlineWelcome: appearanceText,
					offlineWelcome: appearanceText,
					position: ['right', 20, 10],
					textStatuses: true,
				},
                analytics: {
                    google: {
                        id: 'G-Z5DHTFC2DW',
                    },
                },
			};

			if(w.chaport)return;v3=w.chaport={};v3._q=[];v3._l={};v3.q=function(){v3._q.push(arguments)};v3.on=function(e,fn){if(!v3._l[e])v3._l[e]=[];v3._l[e].push(fn)};var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://app.chaport.com/javascripts/insert.js';var ss=d.getElementsByTagName('script')[0];ss.parentNode.insertBefore(s,ss)})(window, document);
	</script>
	<!-- End of Chaport Live Chat code -->
	<!------------------------------------------------------------------------------------------------------------------------------------>
<script>

		window.chaport.on('ready', function(){
			$('.manager-img').append($('.chaport-container'));
			//window.chaport.q('open');
            $('.chaport-window').removeClass('chaport-anim-hide');
		});
        $(document).ready(function(){
			$(window).scroll(function(){
				if($(this).scrollTop() > 83){
					$('header.header').addClass('header-fixed')
				}else{
					$('header.header').removeClass('header-fixed')
				}
			})
		})

</script>
<style>
	.chaport-container.chaport-container-positioned{
		position: relative;
		height: 483px;
		width: 100%;
	}
	.chaport-container.chaport-container-positioned .chaport-window{
		position:relative;
		inset: auto;
		width: 100%;
		height: 483px !important;
	}
	.chaport-container .chaport-inner{
		height: 483px !important;
	}
	@media screen and (max-width: 750px){
		.chaport-container.chaport-container-positioned .chaport-window{
			position:relative !important;
			inset: auto !important;
		}

	}
	body.chaport-mobile.chaport-mobile-maximized{
		position: relative !important;
		overflow: auto !important;
	}
    .chaport-message.chaport-message-with-replies{
        display:none;
    }
    .header-fixed{
		position: fixed;
		padding: 20px 0;
		background: #fff;
		top: 0;
		left: 0;
		width: 100%;
		z-index: 10000000000;
	}
</style>
</body>

</html>