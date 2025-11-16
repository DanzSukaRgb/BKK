<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">    <meta http-equiv="X-UA-Compat[ible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <title>BKK | SMKN 6 JEMBER</title>
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-light: #3b82f6;
            --secondary-color: #10b981;
            --accent-color: #f59e0b;
            --dark-color: #1e293b;
            --light-color: #ffffff;
            --text-color: #334155;
            --text-light: #ffffff;
            --border-color: #ffffff;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.1);
            --shadow-blue: 0 4px 14px rgba(33, 109, 190, 0.3);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            overflow-x: hidden;
            line-height: 1.6;
            background-color: var(--light-color);
        }

        .navbar {
            background-color: white !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
            height: 70px;
        }

        .navbar-brand {
            color: #1e62d0 !important;
            font-weight: 700;
        }

        .nav-link {
            color: #333 !important;
            font-weight: 500;
        }

        .nav-link.active {
            color: #1e62d0 !important;
            font-weight: 600;
        }

        main {
            padding-top: 70px;
            min-height: calc(100vh - 70px);
        }

        .section-title1:after {
            content: '';
            display: block;
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            margin: 1.25rem auto 0;
            border-radius: 2px;
        }


        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            background-image: url('assets/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            padding: 60px 0;
            position: relative;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero-section .container {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            color: var(--light-color);
            margin-bottom: 1.5rem;
            line-height: 1.2;
            font-weight: bold;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--text-light);
            font-weight: 500;
            margin-bottom: 2rem;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        /* About Section */
        .about-section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 3rem;
            color: var(--text-color);

        }

        .section-title1 {
            text-align: center;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 3rem;
            color: var(--text-color);

        }

        .about-content {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
            align-items: flex-start;
        }

        .about-text {
            flex: 1;
            min-width: 300px;
            line-height: 1.8;
            font-size: 1rem;
            text-align: justify;
        }

        .about-image {
            flex: 0 0 auto;
            max-width: 270px;
        }

        .about-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* Company Section */
        .company-section {
            padding: 80px 0;
            background: linear-gradient(to bottom, #f8fafc 0%, #ffffff 100%);
        }

        .company-scroller {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: none;
            scrollbar-width: none;
            padding: 20px 0;
        }

        .company-scroller::-webkit-scrollbar {
            display: none;
        }

        .company-track {
            display: flex;
            gap: 15px;
            width: max-content;
            animation: scroll 30s linear infinite;
        }

        .company-card {
            flex: 0 0 180px;
            padding: 15px;
            background: white;
            border-radius: 14px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .company-logo {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* Stats Section */
        .stats-section {
            padding: 5rem 0;
            background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
            color: white;
            position: relative;
        }

        .stats-section .section-title {
            color: white;
        }

        .stats-section .section-title:after {
            background: rgba(255, 255, 255, 0.5);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1.8rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border-radius: 16px;
            padding: 2rem 1.5rem;
            text-align: center;
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.15);
            position: relative;
            overflow: hidden;
        }

        .stat-card:before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            transform: rotate(45deg);
            transition: all 0.6s ease;
            opacity: 0;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .stat-card:hover:before {
            opacity: 1;
            transform: rotate(45deg) translate(20%, 20%);
        }

        .stat-number {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            background: linear-gradient(90deg, white, #f1f1f1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            position: relative;
            display: inline-block;
        }

        .stat-label {
            font-size: 1.05rem;
            opacity: 0.9;
            margin: 0;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        /* Activities Section */
        .activities-section {
            padding: 80px 0;
            background-color: var(--light-color);
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-subtitle {
            color: #666;
            font-size: 1.1rem;
        }

        .activities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .activity-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        .activity-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .activity-card .card-body {
            padding: 25px;
        }

        .activity-card .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .activity-card .card-text {
            color: #666;
            margin-bottom: 20px;
        }

        /* Gallery Section */
        .gallery-section {
            padding: 3rem 0;
            background-color: #f8f9fa;
        }

        .gallery-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .category-filter {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 2rem;
            justify-content: center;
        }

        .filter-btn {
            padding: 8px 16px;
            border: none;
            border-radius: 20px;
            background-color: #e9ecef;
            color: #495057;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.2s ease;
            font-weight: 500;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background-color: #0d6efd;
            color: #ffffff !important;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 2rem;
        }

        .gallery-card {
            background: rgb(255, 255, 255) !important;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(12, 9, 214, 0.1) !important;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 180px;
            overflow: hidden;
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3));
            z-index: 1;
        }

        .gallery-card:hover .card-image {
            transform: scale(1.05);
        }

        .card-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-category {
            display: inline-block;
            padding: 4px 10px;
            background-color: #f1f8ff;
            color: #0d6efd;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 10px;
            align-self: flex-start;
        }

        .card-title {
            font-size: 1.1rem;
            margin: 0 0 10px;
            color: #212529;
        }

        .card-description {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 15px;
            flex-grow: 1;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        .card-date {
            color: #6c757d;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .read-more {
            color: #0d6efd;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color 0.3s ease;
        }

        .read-more:hover {
            color: #0a58ca;
        }

        .no-kegiatan {
            grid-column: 1 / -1;
            text-align: center;
            padding: 3rem 0;
        }

        .empty-state {
            max-width: 400px;
            margin: 0 auto;
        }

        .empty-state i {
            font-size: 3rem;
            color: #adb5bd;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            color: #343a40;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: #6c757d;
        }

        .load-more-container {
            text-align: center;
            margin-top: 2rem;
        }

        .load-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 25px;
            background-color: #0d6efd;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .load-more-btn:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
        }

        /* Navbar */
        .navbar {
            position: fixed;
            width: 100%;
            height: 12%;
            z-index: 1000;
            transition: var(--transition);
            background-color: transparent !important;
            padding: 10px 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .navbar.scrolled {
            background-color: white !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
        }

        .why-choose-us {
            position: relative;
            overflow: hidden;
        }

        .benefit-card {
            border-radius: 10px;
            background: white;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .benefit-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .benefit-icon {
            color: var(--primary);
            transition: all 0.3s ease;
        }

        .benefit-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .benefit-text {
            color: #666;
            font-size: 0.95rem;
        }

        .benefit-number {
            font-size: 2rem;
            font-weight: 700;
            color: rgba(0, 0, 0, 0.05);
            line-height: 1;
        }

        .divider {
            width: 80px;
            height: 3px;
            background: var(--primary);
            margin: 15px auto;
        }

        .nav-link {
            color: rgba(41, 41, 41, 0.8) !important;
            transition: var(--transition);
            font-weight: 600;
            padding: 8px 15px !important;
        }

        .navbar.scrolled .nav-link {
            color: rgba(0, 0, 0, 0.7) !important;
        }

        .navbar-brand {
            color: rgb(21, 72, 139) !important;
            font-weight: 700;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .navbar.scrolled .navbar-brand {
            color: var(--primary-color) !important;
        }

        .nav-link:hover {
            color: rgb(0, 0, 0) !important;
        }

        .navbar.scrolled .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .logo {
            width: 40px;
            height: auto;
            margin-right: 10px;
            transition: var(--transition);
        }

        .navbar.scrolled .logo {
            filter: none;
        }

        .footer {
            background-color: #ffffff;
            padding: 40px 60px;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 30px;
        }

        .footer-logo {
            max-width: 160px;
            margin-bottom: 15px;
        }

        .footer h3 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .footer p {
            font-size: 14px;
            line-height: 1.6;
            color: #333;
        }

        .footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer ul li {
            margin-bottom: 8px;
        }

        .footer ul li a {
            text-decoration: none;
            font-size: 14px;
            color: #333;
            transition: 0.3s;
        }

        .footer ul li a:hover {
            color: #007bff;
        }

        .footer .logo {
            font-size: 24px;
            font-weight: bold;
            color: #1e62d0;
            margin-bottom: 10px;
        }

        .footer .social {
            margin: 15px 0;
        }

        .footer .social a {
            display: inline-block;
            margin-right: 10px;
            font-size: 16px;
            color: #333;
            transition: 0.3s;
        }

        .footer .social a:hover {
            color: #007bff;
        }

        .footer .logos img {
            height: 30px;
            margin: 5px 10px 0 0;
        }

        /* Filter Section */
        .filter-section {
            margin-top: 50px;
            background: #ffffff;
        }

        .filter-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .filter-tabs {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 0;
        }

        .filter-btn {
            background: transparent;
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            cursor: pointer;
            white-space: nowrap;
        }

        .filter-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-1px);
        }

        .filter-btn.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            box-shadow: var(--shadow-md);
        }

        /* Gallery Section */
        .gallery-section {
            padding: 5rem 0;
            background: linear-gradient(to bottom, #ffffff 0%, #ffffff 100%);
            position: relative;
        }

        .gallery-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .gallery-header {
            text-align: center;
            margin-bottom: 3.5rem;
        }

        .gallery-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .gallery-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }

        .gallery-subtitle {
            font-size: 1.15rem;
            color: #64748b;
            max-width: 700px;
            margin: 0 auto;
        }

        .gallery-filter {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-bottom: 3rem;
        }

        .filter-btn {
            padding: 0.75rem 1.75rem;
            border: none;
            border-radius: 50px;
            background-color: white;
            color: #475569;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.15);
            border-color: transparent;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 2.5rem;
            margin-bottom: 4rem;
        }

        .gallery-item {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.4s ease;
        }

        .gallery-item.hidden {
            display: none;
        }

        .gallery-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(16, 32, 170, 0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            border: 1px solid rgba(0, 0, 0, 0.03);
            position: relative;
        }

        .gallery-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.15);
            border-color: rgba(37, 99, 235, 0.1);
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 240px;
            overflow: hidden;
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 280px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-button {
            position: absolute;
            padding: 10px 18px;
            background-color: rgba(0, 123, 255, 0.9);
            color: white;
            border-radius: 5px;
            text-decoration: none;
            opacity: 0;
            z-index: 2;
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateY(10px);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .image-container:hover .image-button {
            opacity: 1;
        }

        .image-container:hover .card-image {
            filter: blur(4px);
            transform: scale(1.05);
        }

        .image-button i {
            margin-right: 6px;
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: filter 0.4s ease, transform 0.4s ease;
        }

        .gallery-card:hover .card-image {
            transform: scale(1.08);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.01), rgba(0, 0, 0, 0.2));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .gallery-card:hover .image-overlay {
            opacity: 1;
        }

        .view-button {
            padding: 12px 24px;
            background: rgba(255, 255, 255, 0.9);
            color: var(--primary-color);
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            transform: translateY(10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .gallery-card:hover .view-button {
            transform: translateY(0);
        }

        .view-button:hover {
            background: white;
            color: var(--primary-dark);
            transform: translateY(-2px) !important;
        }

        .card-content {
            padding: 1.75rem;
        }

        .card-category {
            display: inline-block;
            background: rgba(37, 99, 235, 0.08);
            color: var(--primary-color);
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .card-description {
            color: #64748b;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #f1f5f9;
        }

        .card-date {
            color: #94a3b8;
            font-size: 0.85rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .card-action {
            background: white;
            border: 1px solid var(--primary-light);
            color: var(--primary-color);
            padding: 0.6rem 1.25rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .card-action:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.2);
        }

        .load-more-container {
            text-align: center;
            margin-top: 2rem;
        }

        .load-more-btn {
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            border: none;
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.2);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .load-more-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
        }

        /* Modal Styles */
        .modal-content {
            border: none;
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 600;
            color: var(--text-primary);
        }

        .btn-close {
            background: none;
            border: none;
            opacity: 0.6;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-image {
            border-radius: 12px;
            max-height: 400px;
            object-fit: cover;
        }

        .modal-description {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-top: 1rem;
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
        }

        .btn-secondary {
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            border-radius: 8px;
            font-weight: 500;
        }

        .auth-page-wrapper {
            min-height: 100vh;
            background: linear-gradient(to right, #e0ecff, #f7f9fc);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .auth-card {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 400px;
        }

        .auth-card h4 {
            font-weight: 600;
            color: #0d6efd;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #084cd6;
            border-color: #084cd6;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #842029;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
        }

        .invalid-feedback {
            font-size: 0.9rem;
            color: #dc3545;
        }

        .text-decoration-none {
            color: #0d6efd;
            transition: 0.2s;
        }

        .text-decoration-none:hover {
            color: #063aab;
            text-decoration: underline;
        }

        .form-check-label {
            color: #555;
        }

        /* Testimoni */
        .why-choose-us {
            position: relative;
            overflow: hidden;
        }

        .benefit-card {
            border-radius: 10px;
            background: white;
            /* transition: all 0.3s ease; */
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .benefit-card:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .benefit-icon {
            color: var(--primary);
            transition: all 0.3s ease;
        }

        .benefit-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .benefit-text {
            color: #666;
            font-size: 0.95rem;
        }

        .benefit-number {
            font-size: 2rem;
            font-weight: 700;
            color: rgba(0, 0, 0, 0.05);
            line-height: 1;
        }

        .divider {
            width: 80px;
            height: 3px;
            background: var(--primary);
            margin: 15px auto;
        }

        .career-cta-section {
            background-image: url('assets/karer.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 120px 0;
            position: relative;
            z-index: 1;
        }

        .career-cta-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            /* Overlay gelap agar teks tetap terbaca */
            z-index: 1;
        }

        .career-cta-section .container {
            position: relative;
            z-index: 2;
        }

        /* FAQ Section Styles */
        .faq-section {
            position: relative;
        }

        .section-title {
            font-size: 2.3rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #64748b;
            max-width: 700px;
            margin: 0 auto;
        }

        .accordion-button {
            font-size: 1.05rem;
            background-color: #f8fafc;
            transition: all 0.3s ease;
        }

        .accordion-button:not(.collapsed) {
            background-color: #f1f5f9;
            color: #1e40af;
        }

        .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(59, 130, 246, 0.3);
        }

        .accordion-body {
            font-size: 0.95rem;
            color: #475569;
            line-height: 1.7;
        }

        .accordion-body ul,
        .accordion-body ol {
            padding-left: 1.2rem;
        }

        .accordion-body li {
            margin-bottom: 0.5rem;
        }

        .table {
            font-size: 0.9rem;
        }

        /* Animation */
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        /* Responsive Adjustments */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.2rem;
                padding-top: 120px;
            }

            .section-title {
                font-size: 2rem;
            }

            .about-content {
                flex-direction: column;
                align-items: center;
            }

            .about-text {
                min-width: 100%;
                order: 2;
            }

            .about-image {
                order: 1;
                margin-bottom: 30px;
            }

            .navbar-collapse {
                background-color: white;
                padding: 20px;
                border-radius: 10px;
                margin-top: 10px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }

            .navbar-collapse .nav-link {
                color: #333 !important;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }

            .navbar-collapse {
                background: white;
                margin-top: 10px;
                border-radius: 8px;
                padding: 15px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }

            .nav-link {
                padding: 10px 15px !important;
                border-bottom: 1px solid #f0f0f0;
            }

            .nav-link:last-child {
                border-bottom: none;
            }
        }

        @media (max-width: 768px) {
            .hero-buttons {
                width: 120px;
                display: flex;
            }

            .accordion-button {
                font-size: 1rem;
                padding: 1rem 1.25rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 1.75rem;
                margin-bottom: 2rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .stat-number {
                font-size: 2rem;
            }

            .footer-col {
                width: 50%;
            }

            .benefit-card {
                margin-bottom: 20px;
            }

            .footer {
                grid-template-columns: 1fr 1fr;
            }
        }


        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.8rem;
                padding-top: 100px;
            }

            .hero-buttons .btn {
                width: 100%;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .accordion-body {
                padding: 1rem;
            }

            .table {
                font-size: 0.8rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .footer-col {
                width: 100%;
            }

            .company-card {
                flex: 0 0 150px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .footer {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 400px) {
            .hero-title {
                font-size: 1.5rem;
            }

            .activities-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    @yield('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('image/logosmk (1).png') }}" alt="logo" class="logo">
                BKK SMKN 6 JEMBER
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#tentang">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('perusahaan*') ? 'active' : '' }}"
                            href="{{ route('perusahaan.public') }}">Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('kegiatan*') ? 'active' : '' }}"
                            href="{{ route('kegiatan.public') }}">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('lowongan*') ? 'active' : '' }}"
                            href="{{ route('lowongan.public') }}">Lowongan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}"
                            href="{{ route('contact') }}">Kontak</a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->role === 'admin')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                                            <i class="fas fa-user-tie me-2"></i> Admin Dashboard
                                        </a>
                                    </li>
                                @elseif(Auth::user()->role === 'perusahaan')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('perusahaan.dashboard') }}">
                                            <i class="fas fa-building me-2"></i> Perusahaan Dashboard
                                        </a>
                                    </li>
                                @elseif(Auth::user()->role === 'alumni')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('alumni.dashboard') }}">
                                            <i class="fas fa-user me-2"></i> Alumni Dashboard
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div>
            <img src="{{ asset('image/logosmk (1).png') }}" alt="BKKBISA Logo" class="footer-logo" width="50"> BKK
            SMKN 6 JEMBER
            <p>BKK SMKN 6 Jember merupakan platform penyedia informasi lowongan pekerjaan berbasis online</p>
            <div class="social">
                <a href="https://www.facebook.com/smkn1tanggul?locale=id_ID"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/smkn6jember/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/@smknegeri6jember"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="logos">
                <img src="{{ asset('image/logokementrian.png') }}">
            </div>
        </div>
        <div>
            <h3>Opsi</h3>
            <ul>
                <li><a href="{{ route('perusahaan.public') }}">Daftar Perusahaan</a></li>
                <li><a href="{{ route('lowongan.public') }}">Daftar Lowongan</a></li>
                <li><a href="{{ route('kegiatan.public') }}">Kegiatan</a></li>
            </ul>
        </div>
        <div>
            <h3>Media Sosial</h3>
            <ul>
                <li><a href="https://www.instagram.com/smkn6jember/">Instagram</a></li>
                <li><a href="https://www.youtube.com/@smknegeri6jember">Youtube</a></li>
                <li><a href="https://www.facebook.com/smkn1tanggul?locale=id_ID">Facebook</a></li>
            </ul>
        </div>
        <div>
            <h3>Akun</h3>
            <ul>
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile menu close when clicked
        const navLinks = document.querySelectorAll('.nav-link');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }
            });
        });

        // Auto-scrolling for company logos
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.querySelector('.company-track');
            if (track) {
                // Duplicate content for seamless looping
                track.innerHTML += track.innerHTML;

                // Animation for auto-scrolling
                let animation;
                const speed = 1;
                let position = 0;

                function animate() {
                    position -= speed;
                    if (position <= -track.scrollWidth / 2) {
                        position = 0;
                    }
                    track.style.transform = `translateX(${position}px)`;
                    animation = requestAnimationFrame(animate);
                }

                animate();

                // Pause on hover
                track.addEventListener('mouseenter', () => {
                    cancelAnimationFrame(animation);
                });

                track.addEventListener('mouseleave', () => {
                    animate();
                });
            }
        });

        // Gallery filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const galleryItems = document.querySelectorAll('.gallery-item');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    const filterValue = this.getAttribute('data-filter');

                    // Filter items with smooth animation
                    galleryItems.forEach((item, index) => {
                        setTimeout(() => {
                            if (filterValue === 'all' || item.getAttribute(
                                    'data-category') === filterValue) {
                                item.classList.remove('hidden');
                            } else {
                                item.classList.add('hidden');
                            }
                        }, index * 50);
                    });
                });
            });
        });
    </script>
    @yield('scripts')
</body>

</html>
