@extends('layouts.app')
@section('title', 'Home - BKK SMKN 6 JEMBER')

@section('styles')
    <style>
        .hero {
            padding: 10rem;
            /* padding-top: 10rem; */
        }

        .hero-student {
            display: flex;
            justify-content: flex-end;
        }

        .hero-student img {
            width: 400px;
            margin-top: -25rem;
            margin-right: 2rem;
        }

        .hero h1 {
            font-weight: bold;
        }

        .input1 {
            padding: 7px 7px;
            border-radius: 5px;
            border: none;
            box-shadow: 0px 0px 1px 1px rgb(0, 0, 0, 0.3);
            margin-right: 5px;
        }

        select {
            width: 250px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            color: #555;
            outline: none;
            height: 42px;
        }

        select:focus {
            border-color: #3c53d1;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        .search {
            padding: 8px 8px;
            color: #fff;
            background-color: #3c53d1;
            width: 80px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            margin-left: 2px;
        }

        .container-2 {
            display: flex;
            gap: 5px;
        }

        .daftar {
            padding: 12px 12px;
            color: #ffffff;
            border-radius: 5px;
            border: none;
            background-color: #3c53d1;
            margin-top: -1rem;
            text-decoration: none;
            cursor: pointer;
        }

        .wave img {
            margin-top: -15rem;
            width: 100%;
            z-index: 99;
        }

        KIRI .left {
            flex: 1;
            position: relative;
        }

        .main-img {
            width: 100%;
            border-radius: 16px;
            object-fit: cover;
            height: 90vh;
        }

        .small-img {
            position: absolute;
            bottom: 20px;
            right: -20px;
            width: 150px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        .badge {
            position: absolute;
            bottom: -40px;
            left: 0;
            background: #2563eb;
            color: white;
            padding: 15px 25px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
            width: 400px;
            font-size: 26px;
            z-index: 1;
            display: flex;
        }

        .badge img {
            width: 60px;
            height: auto;
            margin-right: 1rem;
        }

        .badge-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .badge-text .number {
            font-size: 28px;
            font-weight: 700;
        }

        .badge-text .label {
            font-size: 16px;
            font-weight: 400;
        }

        /* KANAN */
        .right {
            flex: 1;
        }

        .right h2 {
            font-size: 28px;
            margin-bottom: 15px;
        }

        .right p {
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 25px;
            color: #555;
        }


        .card {
            background: white;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon {
            width: 40px;
            height: 40px;
            background: #e0f2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 18px;
            color: #2563eb;
        }

        .profile {
            display: flex;
            align-items: center;
            margin: 20px 0;
            gap: 12px;
        }

        .section-bkk {
            padding: 60px 0;
        }

        .bkk-left {
            position: relative;
        }

        .bkk-left img.main-img {
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .bkk-left img.small-img {
            position: absolute;
            bottom: -40px;
            right: -4px;
            width: 200px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            height: 30vh;

        }

        .bkk-left .top-img {
            position: absolute;
            top: -40px;
            left: -40px;
            width: 260px;
            border-radius: 16px;
            border: 4px solid #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            height: 30vh;
        }

        .bkk-badge {
            position: absolute;
            bottom: -80px;
            left: 0;
            background-color: #3366ff;
            color: white;
            padding: 15px 25px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 8px 20px rgba(51, 102, 255, 0.2);
            width: 500px;
            height: 15vh;

        }

        .bkk-badge i {
            font-size: 1.8rem;
        }

        .bkk-right h2 {
            font-weight: 700;
            font-size: 2rem;
        }

        .bkk-feature {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 15px 20px;
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 15px;
        }

        .bkk-feature i {
            color: #3366ff;
            font-size: 1.5rem;
        }

        .bkk-teacher {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 20px;
        }

        .bkk-teacher img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .btn-whatsapp {
            background-color: #3366ff;
            color: white;
            border-radius: 30px;
            font-size: 0.9rem;
            padding: 8px 18px;
        }

        .btn-whatsapp:hover {
            background-color: #254edb;
            color: #fff;
        }

        .profile img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .container-4 {
            display: flex;
            max-width: 1200px;
            margin: 30px auto;
            gap: 20px;
        }

        .left {
            flex: 2;
        }

        .left h2 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .left p {
            color: #666;
            margin-bottom: 20px;
        }

        .kategori {
            background: #406AE7;
            padding: 50px 20px;
            color: #fff;
            text-align: center;
            margin-top: -4rem;
        }

        .kategori-header {
            margin-left: 10rem
        }

        .kategori-header h2 {
            font-size: 34px;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: start;
        }

        .kategori-header p {
            font-size: 14px;
            margin-bottom: 40px;
            text-align: start;
        }

        .kategori-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            max-width: 1000px;
            margin: auto;
        }

        .kategori-card {
            background: #fff;
            color: #333;
            padding: 25px 15px;
            border-radius: 12px;
            text-align: center;
            transition: 0.3s;
            cursor: pointer;
        }

        .kategori-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .kategori-card i {
            font-size: 28px;
            color: #406AE7;
            margin-bottom: 12px;
            display: block;
        }

        .kategori-card span {
            font-size: 14px;
            font-weight: bold;
        }

        .job-info {
            display: flex;
            align-items: center;
            gap: 15px;
            flex: 1;
        }

        .job {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 15px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            gap: 2rem;
        }

        .job-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .job-info img {
            width: 300px;
        }

        .job-info2 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex: 1;
            gap: 15px;
        }

        .job-info2 p {
            margin: 0;
            font-size: 14px;
            flex: 1;
        }

        .job-info2 img {
            margin-left: 2rem;
        }

        .job-info button {
            background: #2979ff;
            border: none;
            color: #fff;
            padding: 6px 14px;
            border-radius: 6px;
            cursor: pointer;
        }

        .job-info button:hover {
            background: #1565c0;
        }

        .job-info img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            object-fit: contain;
            background: #fff;
            padding: 5px;
        }

        .job-text h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .job-text p {
            font-size: 13px;
            color: #555;
        }

        .right {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .profile {
            background: white;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
            object-fit: cover;
        }

        .profile h4 {
            margin-bottom: 5px;
        }

        .steps {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .steps li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 15px;
            color: #333;
        }

        .steps li .circle {
            width: 24px;
            height: 24px;
            border: 2px solid #4a90e2;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-size: 12px;
            font-weight: bold;
            color: #4a90e2;
        }

        .steps,
        .latest {
            background: white;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .steps h3,
        .latest h3 {
            margin-bottom: 15px;
            font-size: 18px;
        }

        .steps ul {
            list-style: none;
        }

        .steps ul li {
            margin-bottom: 10px;
            font-size: 14px;
            color: #555;
        }

        .latest ul {
            list-style: none;
        }

        .latest ul li {
            margin-bottom: 12px;
            font-size: 14px;
            color: #333;
        }

        .latest ul li small {
            display: block;
            color: #777;
            font-size: 12px;
        }

        .latest button {
            background: #2979ff;
            border: none;
            color: #fff;
            font-size: 13px;
            padding: 6px 14px;
            border-radius: 6px;
            cursor: pointer;
        }

        .latest button:hover {
            background: #1565c0;
        }

        .testimoni {
            text-align: center;
            padding: 50px 0;
            background-color: #ffffff;
            margin-top: 40px;
        }

        .testimoni h2 {
            font-weight: bold;
        }

        :root {
            --primary: #3b6ef6;
            --text: #0e1b25;
            --muted: #6b7a8c;
            --shadow: 0 10px 25px rgba(16, 38, 84, .12);
            --radius: 14px;
        }

        .ts-wrapper {
            max-width: 1100px;
            margin: 0 auto 80px;
            padding: 10px 16px 70px;
            position: relative;
        }

        .ts-viewport {
            overflow: hidden;
            position: relative;
            padding: 30px 0 70px;
        }

        .ts-track {
            display: flex;
            align-items: center;
            gap: 28px;
            transition: transform .6s cubic-bezier(.22, .61, .36, 1);
            will-change: transform;
        }

        .ts-card {
            flex: 0 0 320px;
            background: #ffffff;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 26px 22px 26px;
            text-align: center;
            transition: transform .45s ease, background .35s ease, color .35s ease;
            position: relative;
        }

        .ts-avatar {
            width: 74px;
            height: 74px;
            border-radius: 50%;
            margin: -50px auto 14px;
            border: 4px solid #fff;
            box-shadow: 0 6px 16px rgba(16, 38, 84, .18);
            overflow: hidden;
            display: grid;
            place-items: center;
            background: #dbe6ff;
            color: #234;
            font-weight: 700;
        }

        .ts-name {
            font-weight: 700;
            font-size: 16px;
        }

        .ts-role {
            color: var(--muted);
            font-size: 12px;
            margin-top: 6px;
            line-height: 1.35;
        }

        .ts-stars {
            margin: 12px 0 6px;
            color: #ffb31a;
            letter-spacing: 2px;
            font-size: 18px;
        }

        .ts-score {
            font-weight: 700;
            margin-left: 6px;
            color: #2a2e3b;
        }

        .ts-desc {
            color: #4b5a6b;
            font-size: 13px;
            line-height: 1.6;
            margin-top: 8px;
        }

        .ts-card.active {
            background: var(--primary);
            color: #fff;
            transform: translateY(-6px) scale(1.02);
        }

        .ts-card.active .ts-role,
        .ts-card.active .ts-desc {
            color: rgba(255, 255, 255, .92)
        }

        .ts-card.active .ts-stars {
            color: #fff88a
        }

        .ts-card.active .ts-score {
            color: #fff
        }

        .ts-card.left {
            transform: none;
            opacity: .96;
        }

        .ts-card.right {
            transform: none;
            opacity: .96;
        }

        .ts-nav {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            pointer-events: none;
        }

        .ts-btn {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 2px solid var(--primary);
            background: #fff;
            color: var(--primary);
            display: grid;
            place-items: center;
            cursor: pointer;
            user-select: none;
            transition: background .25s ease, color .25s ease, transform .25s ease;
            pointer-events: auto;
        }

        .ts-btn:hover {
            background: var(--primary);
            color: #fff
        }

        .ts-btn:active {
            transform: scale(.95)
        }

        .ts-dots {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0 6px;
            pointer-events: auto;
        }

        .ts-dot {
            width: 28px;
            height: 6px;
            border-radius: 999px;
            background: #c9d5ff;
            transition: width .3s ease, background .3s ease;
            cursor: pointer;
        }

        .ts-dot.active {
            width: 42px;
            background: var(--primary)
        }


        .tracer-study {
            background-color: #f9f9f9;
            padding: 50px 20px;
            text-align: center;
        }

        .tracer-study h2 {
            font-size: 28px;
            margin-bottom: 30px;
            font-weight: bold
        }

        .chart-legend-wrapper {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .chart-container {
            width: 300px;
            height: 300px;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .legend-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            text-align: left;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }

        .agenda {
            max-width: 1100px;
            margin: 40px auto 80px;
            padding: 0 16px;
            color: #0f172a;
        }

        .agenda-header h2 {
            font-size: clamp(26px, 4vw, 36px);
            line-height: 1.2;
            margin-bottom: 12px;
        }

        .agenda-grid {
            display: grid;
            grid-template-columns: 1fr 0.9fr;
            gap: 24px;
            align-items: start;
        }

        /* List kiri */
        .agenda-list {
            display: grid;
            gap: 14px;
        }

        .agenda-item {
            display: grid;
            grid-template-columns: 112px 1fr;
            gap: 14px;
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(16, 38, 84, .08);
            padding: 12px;
            align-items: center;
        }

        .agenda-item img {
            width: 112px;
            height: 88px;
            object-fit: cover;
            border-radius: 10px;
        }

        .agenda-title {
            margin: 0 0 6px 0;
            font-size: 16px;
            font-weight: 700;
        }

        .agenda-desc {
            margin: 0 0 10px 0;
            font-size: 13px;
            color: #616d7e;
            line-height: 1.5;
        }

        .agenda-actions {
            display: grid;
            grid-template-columns: auto 1fr;
            align-items: center;
            gap: 10px;
        }

        .agenda-date {
            justify-self: end;
            font-size: 12px;
            color: #7c8aa0;
        }

        /* Tombol */
        .btn-primary {
            display: inline-block;
            background: #3b82f6;
            color: #fff;
            padding: 8px 12px;
            font-size: 13px;
            border-radius: 8px;
            text-decoration: none;
            box-shadow: 0 6px 14px rgba(59, 130, 246, .25);
            transition: background .2s ease, transform .05s ease;
        }

        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-1px);
        }

        .btn-secondary {
            display: inline-block;
            background: #1f51f2;
            color: #fff;
            padding: 10px 14px;
            font-size: 13px;
            border-radius: 10px;
            text-decoration: none;
            box-shadow: 0 6px 14px rgba(31, 81, 242, .25);
            transition: background .2s ease, transform .05s ease;
        }

        .btn-secondary:hover {
            background: #1643d8;
            transform: translateY(-1px);
        }

        .btn-secondary.light {
            background: #ffffff;
            color: #1f51f2;
        }

        .btn-secondary.light:hover {
            background: #eaf0ff;
        }

        .all-agenda {
            margin-top: 6px;
        }

        /* Kanan */
        .agenda-side {
            display: grid;
            gap: 16px;
        }

        /* Featured card besar */
        .feature-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(16, 38, 84, .08);
            overflow: hidden;
        }

        .feature-media {
            margin: 0;
            aspect-ratio: 16/9;
            overflow: hidden;
        }

        .feature-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .feature-body {
            padding: 14px 14px 16px;
        }

        .feature-title {
            margin: 0 0 6px 0;
            font-size: 16px;
            line-height: 1.45;
            font-weight: 700;
        }

        .feature-meta {
            margin: 0 0 10px 0;
            font-size: 12px;
            color: #7c8aa0;
        }

        /* Promo card biru + gambar */
        .promo-card {
            position: relative;
            background: #3b82f6;
            color: #fff;
            border-radius: 16px;
            overflow: hidden;
            min-height: 140px;
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: center;
            padding: 16px;
            box-shadow: 0 10px 25px rgba(16, 38, 84, .08);
        }

        .promo-body {
            z-index: 1;
        }

        .promo-title {
            margin: 0 0 6px 0;
            font-size: 18px;
            line-height: 1.25;
        }

        .promo-meta {
            margin: 0 0 10px 0;
            font-size: 12px;
            color: rgba(255, 255, 255, .9);
        }

        .promo-img {
            width: 190px;
            height: auto;
            object-fit: contain;
            justify-self: end;
            filter: drop-shadow(0 8px 18px rgba(0, 0, 0, .2));
            margin-bottom: -2rem;
        }

        .contact-section {
            text-align: center;
            padding: 40px 20px;
            background-color: #ffffff;
        }

        .contact-section h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .contact-section p {
            font-size: 14px;
            color: #555;
            margin-bottom: 30px;
        }

        .contact-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 40px;
            max-width: 1000px;
            margin: auto;
        }

        .contact-form {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .contact-form label {
            text-align: left;
            font-size: 14px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .contact-form input,
        .contact-form textarea {
            padding: 15px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            background: #e9ecef;
            font-size: 14px;
        }

        .contact-form button {
            padding: 12px;
            background-color: #2b65f7;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .contact-form button:hover {
            background-color: #1d4ed8;
        }

        .contact-info {
            flex: 1;
            text-align: left;
        }

        .map {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .address {
            font-size: 14px;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .address i {
            color: red;
            margin-right: 5px;
        }

        .social-links img {
            width: 30px;
            margin-top: -2rem;
        }

        .social-links a:hover {
            color: #2b65f7;
        }



        /* Tablet Landscape dan Desktop Kecil */
        @media (max-width: 1199px) {
            .hero {
                padding: 6rem 4rem;
                padding-top: 8rem;
            }

            .hero-student img {
                display: none;
            }

            .kategori-header {
                margin-left: 5rem;
            }

            .container-4 {
                max-width: 95%;
                gap: 15px;
            }

            .bkk-badge {
                width: 450px;
            }

            .wave img {
                margin-top: -8rem;
            }
        }

        /* Tablet Portrait */
        @media (max-width: 991px) {
            .hero {
                padding: 5rem 2rem;
                padding-top: 7rem;
                text-align: center;
            }

            .wave img {
                margin-top: -8rem;
            }

            .hero-student {
                display: none;
            }

            .hero-student img {
                width: 300px;
                margin-top: 0;
                margin-right: 0;
            }

            .container-2 {
                justify-content: center;
                flex-wrap: wrap;
            }

            .input1,
            select {
                width: 200px;
            }

            .kategori-header {
                margin-left: 2rem;
                text-align: center;
            }

            .kategori-header h2,
            .kategori-header p {
                text-align: center;
            }

            .container-4 {
                flex-direction: column;
                gap: 30px;
            }

            .left,
            .right {
                width: 100%;
            }

            .bkk-left .top-img {
                width: 200px;
                left: -20px;
                top: -20px;
            }

            .bkk-left img.small-img {
                width: 150px;
                bottom: -20px;
                right: 0;
            }

            .bkk-badge {
                width: 350px;
                height: auto;
                padding: 12px 20px;
                bottom: -60px;
            }

            .agenda-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
              .contact-container {
        flex-direction: column;
        align-items: center;
        gap: 30px;
    }

    .contact-form,
    .contact-info {
        width: 80%;
    }

    .contact-section h2 {
        font-size: 2rem;
    }
        }

        /* Mobile Landscape */
        @media (max-width: 767px) {
            .hero {
                padding: 4rem 1rem;
                padding-top: 6rem;
            }

            .hero h1 {
                font-size: 1.8rem;
            }

            .wave {
                margin-top: 60px;
            }

            .hero-student img {
                display: none;
            }

            .container-2 {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .input1,
            select {
                width: 100%;
                max-width: 300px;
                margin-top: 9px;
            }

            .search,
            .daftar {
                width: 100%;
                max-width: 300px;
                margin-left: 0;
            }

            .wave img {
                margin-top: -8rem;
            }

            .kategori {
                margin-top: -2rem;
                padding: 40px 15px;
            }

            .kategori-header {
                margin-left: 0;
            }

            .kategori-header h2 {
                font-size: 28px;
            }

            .kategori-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .kategori-card {
                padding: 20px 10px;
            }

            .kategori-card i {
                font-size: 24px;
            }

            .kategori-card span {
                font-size: 12px;
            }

            .section-bkk {
                padding: 40px 0;
            }

            .bkk-left .top-img,
            .bkk-left img.small-img {
                display: none;
            }

            .bkk-badge {
                position: relative;
                width: 100%;
                bottom: 0;
                margin-top: 20px;
            }

            .bkk-right h2 {
                font-size: 1.5rem;
            }

            .job-card {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .job-info {
                flex-direction: column;
            }

            .job-info img {
                width: 80px;
                height: 80px;
            }

            .containerprofile img {
                display: none
            }

            .steps hr {
                width: 100% !important;
            }

            .ts-card {
                flex: 0 0 280px;
            }

            .agenda-item {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .agenda-item img {
                width: 100%;
                height: 150px;
            }

            .agenda-actions {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .agenda-date {
                justify-self: center;
            }

            .promo-card {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .promo-img {
                justify-self: center;
                margin-bottom: 0;
            }
               .contact-form,
    .contact-info {
        width: 90%;
    }

    .social-links img {
        width: 30px;
        height: 30px;
    }

        }

        /* Mobile Portrait */
        @media (max-width: 575px) {
            .hero {
                padding: 3rem 1rem;
                padding-top: 5rem;
            }

            .hero h1 {
                font-size: 1.5rem;
            }

            .wave {
                margin-top: 60px;
            }

            .hero-student img {
                display: none;
            }

            .kategori-container {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .kategori-card {
                padding: 25px 15px;
            }

            .badge {
                width: 100%;
                position: relative;
                bottom: 0;
                margin-top: 20px;
            }

            .badge-text .number {
                font-size: 24px;
            }

            .job {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .job-info2 {
                flex-direction: column;
                gap: 10px;
            }

            .job-info2 img {
                margin-left: 0;
            }

            .ts-wrapper {
                padding: 10px 10px 70px;
            }

            .ts-card {
                flex: 0 0 260px;
                padding: 20px 15px;
            }

            .chart-legend-wrapper {
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }

            .chart-container {
                width: 250px;
                height: 250px;
            }

            .legend-container {
                text-align: center;
            }

            .social-links img {
                width: 25px;
            }

    .contact-section {
        padding: 40px 15px;
    }

    .contact-section h2 {
        font-size: 1.7rem;
    }

    .contact-container {
        gap: 25px;
    }

    .contact-form input,
    .contact-form textarea {
        font-size: 15px;
        padding: 10px;
    }

    .contact-form button {
        padding: 10px;
        font-size: 0.95rem;
    }

    .social-links img {
        width: 28px;
        height: 28px;
    }
        }

        /* Very Small Mobile */
        @media (max-width: 375px) {
            .hero {
                padding: 2rem 0.5rem;
                padding-top: 4rem;
            }

            .hero h1 {
                font-size: 1.3rem;
            }

            .wave {
                margin-top: 60px;
            }

            .input1,
            select {
                font-size: 16px;
                margin-top: 9px;
            }

            .kategori-header h2 {
                font-size: 24px;
            }

            .bkk-right h2 {
                font-size: 1.3rem;
            }

            .bkk-feature {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .bkk-teacher {
                flex-direction: column;
                text-align: center;
            }

            .ts-card {
                flex: 0 0 240px;
            }

            .agenda-title {
                font-size: 14px;
            }

            .agenda-desc {
                font-size: 12px;
            }

    .contact-section h2 {
        font-size: 1.5rem;
    }

    .contact-form {
        padding: 18px;
    }

    .contact-form button {
        font-size: 0.9rem;
    }

    .social-links img {
        width: 24px;
        height: 24px;
    }
        }

        /* Height adjustments for mobile */
        @media (max-height: 700px) and (max-width: 767px) {
            .hero {
                min-height: auto;
                padding-top: 5rem;
            }

            .hero-student img {
                display: none;
            }

            .wave {
                margin-top: 60px;
            }
        }

        /* Orientation specific */
        @media (max-width: 767px) and (orientation: landscape) {
            .hero {
                padding-top: 4rem;
                min-height: auto;
            }

            .hero-student img {
                display: none;
            }

            .container-2 {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .wave {
                margin-top: 60px;
            }

            .input1,
            select {
                width: 45%;
                margin-top: 9px;
            }
        }

        /* Print styles */
        @media print {

            .hero-student,
            .wave,
            .social-links,
            .ts-nav,
            .agenda-side {
                display: none;
            }

            .hero {
                padding: 2rem 0;
                color: black;
                background: white;
            }

            .kategori {
                background: white !important;
                color: black !important;
                margin-top: 0;
            }

            .kategori-card {
                border: 1px solid #ccc;
            }
        }
    </style>
@endsection

@section('content')
    <div class="hero">
        <div class="container">
            <img src="{{ asset('image/Pattern.png') }}" alt="" width="200" class="pattern1" style="margin-top: -9.6rem; left: 0; position: absolute;">
        <img src="{{ asset('image/Pattern.png') }}" alt="" width="200" class="pattern2" style="margin-top:  -9.6rem;  left: 74rem; position: absolute;">

            <h1>Cari Lowongan Kerja</h1>

            <div class="container-2">
                <div class="input">
                    <input type="text" placeholder="Posisi/Perusahaan" class="input1">
                    <select>
                        <option selected disabled>Pilih Lokasi</option>
                        <option value="developer">Jember</option>
                        <option value="designer">Malang</option>
                        <option value="marketing">Surabaya</option>
                        <option value="manager">Sidoarjo</option>
                    </select>
                </div>
                <a href="{{ route('lowongan.public') }}" class="search">Cari</a>
            </div>

            <br>
            <p>Daftar Sekarang dan dapatkan pekerjaan secepatnya</p>
            <br>
            <a href="{{ route('register') }}" class="daftar">Daftar Sekarang</a>
        </div>
    </div>

    <div class="hero-student">
        <img src="{{ asset('image/siswi.png') }}" alt="" class="img-fluid rounded" style="width:500px;">
    </div>
    <div class="wave">
        <img src="{{ asset('image/Vector 46.png') }}" alt="" width="100%" class="img-fluid rounded"
            style="position: relative;">

        <section class="kategori">
            <div class="kategori-header">
                <h2>Kategori</h2>
                <p>Kami menyediakan berbagai kategori perusahaan sesuai bidang anda</p>
            </div>

            <div class="kategori-container">
                <div class="kategori-card">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Administrasi</span>
                </div>
                <div class="kategori-card">
                    <i class="fas fa-user-cog"></i>
                    <span>Operator</span>
                </div>
                <div class="kategori-card">
                    <i class="fas fa-tools"></i>
                    <span>Teknisi</span>
                </div>
                <div class="kategori-card">
                    <i class="fas fa-industry"></i>
                    <span>Industri</span>
                </div>
                <div class="kategori-card">
                    <i class="fas fa-network-wired"></i>
                    <span>IT / TIK</span>
                </div>
                <div class="kategori-card">
                    <i class="fas fa-notes-medical"></i>
                    <span>Kesehatan</span>
                </div>
            </div>
        </section>

        <img src="{{ asset('image/Vector 47.png') }}" alt="" style="margin-top: -2rem;" width="100%"
            class="img-fluid rounded">
    </div>

    <section id="tentang">
        <section class="section-bkk py-5">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 text-center">
                        <div class="position-relative">
                            <img src="{{ asset('image/Rectangle 463.png') }}" class="img-fluid rounded shadow mb-3"
                                alt="Tim BKK">
                            <img src="{{ asset('image/logobkk.jpg') }}"
                                class="position-absolute bottom-0 end-0 rounded shadow" style="width: 120px;"
                                alt="Rapat">
                            <div
                                class="position-absolute bottom-0 start-0 bg-white shadow rounded d-flex align-items-center p-2">
                                <i class="fa-solid fa-medal text-primary fs-4 me-2"></i>
                                <div>
                                    <h5 class="mb-0 fw-bold">100+</h5>
                                    <small class="text-muted">Siswa Unggul</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h2 class="fw-bold mb-3">Tentang BKK</h2>
                        <p class="text-muted mb-4">
                            BKK SMKN 6 Jember membantu siswa dan alumni menemukan peluang kerja sesuai kompetensi mereka.
                            Sebagai penghubung antara sekolah dan dunia industri, BKK menyediakan informasi lowongan,
                            pelatihan,
                            dan program pengembangan keterampilan untuk mendukung karir lulusan.
                        </p>

                        <div class="p-4 mb-3 bg-light rounded d-flex align-items-start">
                            <i class="fa-solid fa-briefcase text-primary fs-3 me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-2">Lowongan Kerja Terbaik</h6>
                                <p class="text-muted small mb-0">
                                    Temukan lowongan kerja terbaru dari perusahaan mitra SMKN 6 Jember sesuai minat dan
                                    keahlianmu.
                                </p>
                            </div>
                        </div>

                        <div class="p-4 mb-3 bg-light rounded d-flex align-items-start">
                            <i class="fa-solid fa-handshake text-success fs-3 me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-2">Relasi Luas</h6>
                                <p class="text-muted small mb-0">
                                    SMKN 6 Jember memiliki jaringan luas dengan berbagai perusahaan untuk mendukung magang
                                    dan
                                    peluang karier siswa.
                                </p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-4 gap-3">
                            <div class="d-flex align-items-center">
                                <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle me-2"
                                    width="50" height="50" alt="Guru">
                                <div>
                                    <h6 class="fw-bold mb-0">User S.Pd</h6>
                                    <small class="text-muted">Guru BKK</small>
                                </div>
                            </div>
                            <a href="#" class="btn btn-success">
                                <i class="fa-brands fa-whatsapp me-2"></i> Hubungi Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <br><br><br><br>

    <img src="{{ asset('image/Pattern.png') }}" alt="" width="200"
        style="left: 71.9rem; display: flex; position: absolute; margin-top:-8rem;">

    <div class="container-4">
        <div class="left">
            <h2 class="fw-bold">Lowongan Pekerjaan</h2>
            <p>Temukan Lowongan Pekerjaan Terbaru</p>

            @foreach ($lowongan as $job)
                <div class="job-card">
                    <div class="job-info">
                        <img src="{{ asset($job->perusahaan->logo ?? 'image/Rectangle 444.png') }}" alt="Logo">
                        <div class="job-text">
                            <h3>{{ $job->judul }} | {{ $job->perusahaan->nama ?? '-' }}</h3>
                            <p>
                                {{ $job->perusahaan->nama ?? '-' }} <br>
                                Posisi: {{ $job->posisi ?? '-' }} <br>
                                Pendidikan: {{ $job->pendidikan }} <br>
                                Jenis Pekerjaan: {{ $job->jenis_pekerjaan }} <br>
                            </p>
                            <a href="{{ route('lowongan.show', $job->slug) }}" class="btn btn-primary mt-2">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="right">
            <div class="containerprofile">
                <img src="{{ asset('image/Rectangle 447.png') }}" alt="Gambar Orang">
                <div class="content">
                    <ul class="steps">
                        <h3>Alur Pendaftaran Pekerjaan</h3>
                        <hr style="width: 320px;">
                        <br>
                        <li><span class="circle">1</span> Daftar Akun</li>
                        <li><span class="circle">2</span> Login Akun</li>
                        <li><span class="circle">3</span> Verifikasi Akun</li>
                        <li><span class="circle">4</span> Pilih atau cari loker</li>
                        <li><span class="circle">5</span> Daftar Pekerjaan</li>
                        <li><span class="circle">6</span> Daftar Ulang</li>
                    </ul>
                </div>
            </div>

            <div class="latest">
                <h3>Lowongan Teratas</h3>
                @foreach ($lowongan->take(3) as $job)
                    <div class="job">
                        <div class="job-info2">
                            <p>{{ $job->judul }} | {{ $job->perusahaan->nama ?? '-' }}<br> {{ $job->posisi }}</p>
                            <a href="{{ route('lowongan.show.public', $job->slug) }}">
                                <button>Lihat</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <br><br>

    <section class="py-5" style="background: linear-gradient(90deg, #1e3c72, #2a5298); color: white;">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h6 class="text-uppercase">Perusahaan Mitra SMKN 6 Jember</h6>
                    <h2 class="fw-bold">Kesempatan Magang & Kerja Sama Terbaru</h2>
                    <p>SMKN 6 Jember bekerja sama dengan berbagai perusahaan untuk memberikan siswa dan alumni peluang
                        magang, praktik kerja, dan kerja. Temukan mitra yang sesuai minatmu.</p>
                    <a href="{{ route('perusahaan.public') }}" class="btn">Selengkapnya</a>
                </div>
                <div class="col-md-6">
                    <div class="row g-2">
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <img src="{{ asset('image/mitra1.jpeg') }}" class="mb-2" alt="Logo"
                                        width="60">
                                    <h6 class="card-title">MasCitra. Com</h6>
                                    <p class="mb-1"><small>Jember | Software</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <img src="{{ asset('image/mitra2.png') }}" class="mb-2" alt="Logo"
                                        width="60">
                                    <h6 class="card-title">PT Indo Bismar</h6>
                                    <p class="mb-1"><small>Surabaya | Grosir</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <img src="{{ asset('image/mitra3.png') }}" class="mb-2" alt="Logo"
                                        width="60">
                                    <h6 class="card-title">PT OJK Jember</h6>
                                    <p class="mb-1"><small>Jember | Keuangan</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <img src="{{ asset('image/mitra4.png') }}" class="mb-2" alt="Logo"
                                        width="60">
                                    <h6 class="card-title">UBIG</h6>
                                    <p class="mb-1"><small>Malang | Sotware</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <img src="{{ asset('image/mitra5.png') }}" class="mb-2" alt="Logo"
                                        width="60">
                                    <h6 class="card-title">Hummatech</h6>
                                    <p class="mb-1"><small>Malang | Software</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <img src="{{ asset('image/mitra6.png') }}" class="mb-2" alt="Logo"
                                        width="70">
                                    <h6 class="card-title">PT Matahari</h6>
                                    <p class="mb-1"><small>Jember | Ritel</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="testimoni">
        <h2>Testimoni ALumni</h2>
        <p>Yuk intip apa kata alumni tentang BKK</p>
    </div>

    <section class="ts-wrapper" id="testimoni-slider">
        <div class="ts-viewport">
            <div class="ts-track" role="list">
                <article class="ts-card left" role="listitem" aria-label="Testimoni 1">
                    <div class="ts-avatar">HD</div>
                    <div class="ts-name">Helena Dwi Hapsari</div>
                    <div class="ts-role">Alumni RPL, Angkatan 2022 · CEO Gojek</div>
                    <div class="ts-stars" aria-label="Rating 5 dari 5">★★★★★ <span class="ts-score">5.0</span></div>
                    <p class="ts-desc">
                        BKK SMKN 6 Jember sangat membantu saya dalam menemukan pekerjaan pertama saya di bidang IT.
                        Proses pendaftarannya mudah dan informasi lowongannya lengkap.
                    </p>
                </article>

                <article class="ts-card active" role="listitem" aria-label="Testimoni 2">
                    <div class="ts-avatar">RD</div>
                    <div class="ts-name">Rizky Dwi</div>
                    <div class="ts-role">Alumni DKV, Angkatan 2021 · Designer Studio X</div>
                    <div class="ts-stars" aria-label="Rating 5 dari 5">★★★★★ <span class="ts-score">5.0</span></div>
                    <p class="ts-desc">
                        Program BKK memudahkan saya mendapatkan peluang kerja di bidang desain grafis.
                        Jaringan industrinya luas dan prosesnya rapi.
                    </p>
                </article>

                <article class="ts-card right" role="listitem" aria-label="Testimoni 3">
                    <div class="ts-avatar">BD</div>
                    <div class="ts-name">Dewi Lestari</div>
                    <div class="ts-role">Alumni BD, Angkatan 2020 · Content Creator</div>
                    <div class="ts-stars" aria-label="Rating 5 dari 5">★★★★★ <span class="ts-score">5.0</span></div>
                    <p class="ts-desc">
                        Dari pelatihan hingga penempatan kerja di bidang broadcast, semuanya terarah dan efektif.
                        Terima kasih BKK SMKN 6 Jember!
                    </p>
                </article>

                <article class="ts-card right" role="listitem" aria-label="Testimoni 4">
                    <div class="ts-avatar">KK</div>
                    <div class="ts-name">Agus Santoso</div>
                    <div class="ts-role">Alumni KKBT, Angkatan 2019 · Technician</div>
                    <div class="ts-stars" aria-label="Rating 5 dari 5">★★★★★ <span class="ts-score">5.0</span></div>
                    <p class="ts-desc">
                        Rekomendasi banget untuk siswa KKBT yang ingin cepat kerja.
                        Lowongan yang disediakan sesuai dengan minat dan keahlian teknis.
                    </p>
                </article>
            </div>

            <div class="ts-nav">
                <button class="ts-btn ts-prev" aria-label="Sebelumnya">‹</button>
                <div class="ts-dots" aria-hidden="true"></div>
                <button class="ts-btn ts-next" aria-label="Berikutnya">›</button>
            </div>
        </div>
    </section>

    <section class="tracer-study mt-n4">
        <h2>Tracer Study</h2>
        <div class="container">
            @if ($tracerData->isNotEmpty())
                <div class="chart-legend-wrapper">
                    <div class="chart-container">
                        <canvas id="tracerChart"></canvas>
                    </div>
                    <div class="legend-container">
                        @foreach ($tracerData as $data)
                            <div class="legend-item">
                                <div class="legend-color"
                                    style="background-color: {{ $colors[$loop->index] ?? '#000' }}"></div>
                                <p>{{ $data->category }} : <span>{{ $data->value }}</span></p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p>Data not available</p>
            @endif
        </div>
        <br><br>
        <p>
            Data ini setiap tahun akan berubah sesuai dengan website ini
            <a href="https://tracervokasi.kemendikdasmen.go.id/" target="_blank" class="text-blue-600 hover:underline">
                https://tracervokasi.kemendikdasmen. <br>
                go.id/
            </a>.
        </p>
    </section>

    <br><br>

    <section class="agenda" aria-labelledby="agenda-title">
        <div class="agenda-header">
            <h2 id="agenda-title" class="fw-bold">Berita & Kegiatan</h2>
        </div>
        <div class="agenda-grid">
            <div class="agenda-list">
                @if ($kegiatan->isEmpty())
                    <div class="agenda-item" style="text-align:center; padding:40px;">
                        <h3 class="agenda-title mb-2">Belum Ada Kegiatan</h3>
                        <p class="agenda-desc">Saat ini belum ada kegiatan atau agenda yang tersedia.</p>
                    </div>
                @else
                    @foreach ($kegiatan as $item)
                        <article class="agenda-item">
                            <img src="{{ $item->gambar ? asset(str_replace('public/', 'storage/', $item->gambar)) : asset('image/Rectangle 463.png') }}"
                                alt="{{ $item->judul }}">
                            <div class="agenda-body">
                                <h3 class="agenda-title">{{ $item->judul }}</h3>
                                <p class="agenda-desc">{{ Str::limit($item->deskripsi, 80) }}</p>
                                <div class="agenda-actions">
                                    <a href="{{ route('kegiatan.show.public', $item->id) }}" class="btn-primary">Lihat
                                        Detail</a>
                                    <span
                                        class="agenda-date">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @endif
                <a href="{{ route('kegiatan.public') }}" class="btn btn-primary all-agenda">Lihat Semua Agenda</a>
            </div>

            <aside class="agenda-side">
                <h5><i class="fas fa-clock me-2"></i> Terbaru</h5>
                @php $featured = $kegiatan->sortByDesc('created_at')->first(); @endphp
                @if ($featured)
                    <article class="feature-card">
                        <figure class="feature-media">
                            <img src="{{ $featured->gambar ? asset(str_replace('public/', 'storage/', $featured->gambar)) : asset('image/Rectangle 511.png') }}"
                                alt="{{ $featured->judul }}">
                        </figure>
                        <div class="feature-body">
                            <h3 class="feature-title">{{ $featured->judul }}</h3>
                            <p class="feature-meta">{{ $featured->tipe_kegiatan ?? 'BKK SMKN 6 JEMBER' }}</p>
                            <a href="{{ route('kegiatan.show.public', $featured->id) }}" class="btn-secondary">Lihat
                                Detail</a>
                        </div>
                    </article>
                @else
                    <article class="feature-card">
                        <figure class="feature-media">
                            <img src="{{ asset('image/Rectangle 511.png') }}" alt="Featured Webinar">
                        </figure>
                        <div class="feature-body">
                            <h3 class="feature-title">Tidak ada berita terbaru</h3>
                            <p class="feature-meta">BKK SMKN 6 JEMBER</p>
                        </div>
                    </article>
                @endif
            </aside>
        </div>
    </section>

    <br>

    <section class="contact-section">
        <h2>Kontak</h2>
        <p>Hubungi Kami Kapan Saja</p>

        <div class="contact-container">
            <form class="contact-form">
                <label for="nama">Nama</label>
                <input type="text" id="nama" placeholder="Masukkan Nama">

                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" placeholder="Masukkan Alamat">

                <label for="nohp">No Hp</label>
                <input type="text" id="nohp" placeholder="Masukkan No HP">

                <label for="pesan">Pesan</label>
                <textarea id="pesan" rows="4" placeholder="Tulis Pesan..."></textarea>

                <button type="submit">Kirim Pesan</button>
            </form>

            <div class="contact-info">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1412.5328379938078!2d113.4347124269006!3d-8.155450754436908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68b08077adae9%3A0x32c15952de1123cb!2sSMK%20Negeri%206%20Jember!5e0!3m2!1sid!2sid!4v1750121694154!5m2!1sid!2sid"
                    width="100%" height="300" style="border:0; border-radius:8px;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <p class="address">
                    <i class="fas fa-map-marker-alt"></i>
                    RCVP+R39, Jl. PB.Sudirman, Tekoan,
                    Tanggul Kulon, Kec. Tanggul, Kabupaten Jember, Jawa Timur 68155
                </p>
                <p><b>Hubungi Kami</b></p>
                <div class="social-links">
                    <a href="" target="_blank">
                        <img src="{{ asset('image/image 107.png') }}" alt="Facebook">
                    </a>
                    <a href="https://www.facebook.com/smkn1tanggul?locale=id_ID" target="_blank">
                        <img src="{{ asset('image/image 108.png') }}" alt="Twitter">
                    </a>
                    <a href="https://www.youtube.com/@smknegeri6jember" target="_blank">
                        <img src="{{ asset('image/image 109.png') }}" alt="Instagram">
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /** =============================
             *  GRAFIK TRACER STUDY (PIE)
             ==============================*/
            const tracerCtx = document.getElementById('tracerChart');

            if (tracerCtx && typeof Chart !== 'undefined') {
                const values = {!! json_encode($tracerData->pluck('value')) !!};
                const total = values.reduce((a, b) => a + b, 0);

                new Chart(tracerCtx, {
                    type: 'pie',
                    data: {
                        labels: {!! json_encode($tracerData->pluck('category')) !!},
                        datasets: [{
                            data: values,
                            backgroundColor: {!! json_encode($colors) !!},
                            borderWidth: 1,
                            borderColor: '#fff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const percent = ((context.parsed / total) * 100).toFixed(1);
                                        return `${context.label}: ${percent}%`;
                                    }
                                }
                            },
                            datalabels: {
                                color: '#fff',
                                font: {
                                    weight: 'bold',
                                    size: 12
                                },
                                formatter: function(value) {
                                    const percent = ((value / total) * 100).toFixed(1);
                                    return percent + '%';
                                }
                            }
                        }
                    },
                    plugins: [ChartDataLabels]
                });
            } else {
                console.error('Chart.js library not loaded');
            }

            /** =============================
             *  SLIDER TESTIMONI ALUMNI
             ==============================*/
            const slider = document.getElementById('testimoni-slider');
            if (!slider) return;

            const track = slider.querySelector('.ts-track');
            const cards = Array.from(track.children);
            const prevBtn = slider.querySelector('.ts-prev');
            const nextBtn = slider.querySelector('.ts-next');
            const dotsBox = slider.querySelector('.ts-dots');

            let currentIndex = 1;
            let isAnimating = false;
            let autoPlayInterval;

            function initSlider() {
                createDots();
                updateSlider();
                startAutoPlay();

                prevBtn.addEventListener('click', () => navigate(-1));
                nextBtn.addEventListener('click', () => navigate(1));

                dotsBox.addEventListener('click', (e) => {
                    if (e.target.classList.contains('ts-dot')) {
                        const dotIndex = Array.from(dotsBox.children).indexOf(e.target);
                        goToSlide(dotIndex);
                    }
                });

                slider.addEventListener('mouseenter', stopAutoPlay);
                slider.addEventListener('mouseleave', startAutoPlay);

                let startX = 0;
                let currentX = 0;

                track.addEventListener('touchstart', (e) => {
                    startX = e.touches[0].clientX;
                    stopAutoPlay();
                });

                track.addEventListener('touchmove', (e) => {
                    currentX = e.touches[0].clientX;
                });

                track.addEventListener('touchend', () => {
                    const diff = startX - currentX;
                    if (Math.abs(diff) > 50) {
                        if (diff > 0) navigate(1);
                        else navigate(-1);
                    }
                    startAutoPlay();
                });
            }

            function navigate(direction) {
                if (isAnimating) return;
                const newIndex = (currentIndex + direction + cards.length) % cards.length;
                goToSlide(newIndex);
            }

            function goToSlide(index) {
                if (isAnimating || index === currentIndex) return;
                isAnimating = true;
                currentIndex = index;
                updateSlider();
                setTimeout(() => {
                    isAnimating = false;
                }, 600);
            }

            function updateSlider() {
                cards.forEach(card => card.classList.remove('active', 'left', 'right'));
                cards[currentIndex].classList.add('active');

                for (let i = 0; i < cards.length; i++) {
                    if (i < currentIndex) cards[i].classList.add('left');
                    else if (i > currentIndex) cards[i].classList.add('right');
                }

                updateDots();
                updateTrackPosition();
            }

            function updateTrackPosition() {
                const cardWidth = cards[0].offsetWidth;
                const gap = 28;
                const viewportWidth = slider.querySelector('.ts-viewport').offsetWidth;
                const offset = (viewportWidth - (cardWidth + gap)) / 2 - (currentIndex * (cardWidth + gap));
                track.style.transform = `translateX(${offset}px)`;
            }

            function createDots() {
                dotsBox.innerHTML = '';
                cards.forEach((_, index) => {
                    const dot = document.createElement('div');
                    dot.className = 'ts-dot';
                    if (index === currentIndex) dot.classList.add('active');
                    dotsBox.appendChild(dot);
                });
            }

            function updateDots() {
                const dots = dotsBox.querySelectorAll('.ts-dot');
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }

            function startAutoPlay() {
                stopAutoPlay();
                autoPlayInterval = setInterval(() => navigate(1), 5000);
            }

            function stopAutoPlay() {
                if (autoPlayInterval) clearInterval(autoPlayInterval);
            }

            window.addEventListener('resize', updateTrackPosition);
            initSlider();

        });
    </script>


@endsection
