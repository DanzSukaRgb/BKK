@extends('layouts.app')

@section('title', 'Home - BKK SMKN 6 JEMBER')

@section('styles')
    <style>
        /* Hero Section */
        .btn-navbar {
            padding: 12px 12px;
            width: 200px;
            color: #fff;
            background-color: #406AE7;
            border: none;
        }

        .hero {
            padding: 7rem;
            padding-top: 10rem;
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
        }

        .wave img {
            margin-top: -15rem;
            width: 100%;
            z-index: 99;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 1100px;
            margin: 50px auto;
            gap: 40px;
            width: 100%;
        }

        /* KIRI */
        .left {
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
            border: 4px solid white;
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

        .card-containt {
            align-items: center;
            justify-content: center;
            margin: 1rem auto;
            display: inline;
        }

        .text-containt {
            margin-top: 2rem;
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
            width: 250px;
            border-radius: 16px;
            border: 4px solid #fff;
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

        .qr {
            width: 70px;
            height: 70px;
            background: #eee;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: #999;
        }

        .btnnn {
            display: flex;
        }

        .previous {
            padding: 12px 12px;
            color: #3c53d1;
            background-color: #ffffff;
            border: none;
            box-shadow: 0px 0px 1px 1px rgb(0, 0, 0, 0.3);
            border-radius: 5px;
        }

        .next {
            padding: 12px 12px;
            color: #fff;
            background-color: #3c53d1;
            border: none;
            margin-left: 10px;
            border-radius: 5px;
            text-align: center;
            width: 70px;
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

        .mitra {
            text-align: center;
            padding: 50px 0;
            margin-top: 40px;
        }

        .mitra-img img {
            margin-left: 5rem;
        }

        .testimoni {
            text-align: center;
            padding: 50px 0;
            background-color: #ffffff;
            margin-top: 40px;
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
            transform: perspective(800px) rotateZ(-6deg) translateY(10px) scale(.96);
            opacity: .96;
        }

        .ts-card.right {
            transform: perspective(800px) rotateZ(6deg) translateY(10px) scale(.96);
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

        .tracer {
            max-width: 1100px;
            margin: 60px auto 80px;
            padding: 22px;
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(16, 38, 84, .08);
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 26px;
            align-items: center;
            height: 340px;
        }

        .tracer img {
            width: 100%;
            max-width: 360px;
            height: auto;
            display: block;
            border-radius: 12px;
            object-fit: cover;
            margin-left: 5rem;
        }

        .tracer h1 {
            font-size: clamp(26px, 4vw, 40px);
            line-height: 1.15;
            margin-bottom: 10px;
            color: #0e1b25;
            margin-left: 5rem;
        }

        .tracer p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 16px;
            max-width: 60ch;
            margin-left: 5rem;
        }

        .tracer .detail {
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s ease, transform .05s ease, box-shadow .2s ease;
            box-shadow: 0 6px 14px rgba(37, 99, 235, .25);
            margin-left: 5rem;
            text-decoration: none;
        }

        .tracer .detail:hover,
        .tracer .detail:focus-visible {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(29, 78, 216, .35);
        }

        .tracer-study {
            background-color: #f9f9f9;
            padding: 50px 20px;
            text-align: center;
        }

        .tracer-study h2 {
            font-size: 28px;
            margin-bottom: 30px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .chart-legend-wrapper {
            display: flex;
            align-items: flex-start;
            /* sejajar vertikal */
            justify-content: center;
            gap: 40px;
            /* jarak chart dan legend */
            flex-wrap: wrap;
            /* responsif */
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

        .news-section {
            max-width: 1100px;
            margin: 40px auto 80px;
            padding: 0 16px;
            color: #0f172a;
        }

        /* Header */
        .news-header h2 {
            font-size: clamp(26px, 4vw, 34px);
            line-height: 1.2;
            margin-bottom: 6px;
        }

        .news-subtitle {
            color: #6b7280;
            margin-bottom: 16px;
        }

        /* Grid 2 kolom: feature + list */
        .news-grid {
            display: grid;
            grid-template-columns: 1.2fr .9fr;
            gap: 26px;
            align-items: start;
        }

        /* Kartu berita utama (kiri) */
        .news-feature {
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(16, 38, 84, .08);
            overflow: hidden;
            position: relative;
        }

        .news-thumb {
            margin: 0;
            aspect-ratio: 16/9;
            overflow: hidden;
        }

        .news-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .news-meta {
            padding: 12px 16px 0;
        }

        .news-date {
            display: inline-block;
            font-size: 12px;
            color: #6b7280;
            background: #f3f4f6;
            padding: 6px 10px;
            border-radius: 8px;
        }

        .news-feature .news-title {
            padding: 10px 16px 16px;
            font-size: clamp(16px, 2.2vw, 20px);
            line-height: 1.45;
            font-weight: 700;
            color: #0f172a;
        }

        /* Actions: nav, semua berita, read icon */
        .news-actions {
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            gap: 10px;
            padding: 0 16px 16px 16px;
        }

        .news-nav {
            display: flex;
            gap: 6px;
        }

        .news-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            background: #fff;
            color: #334155;
            cursor: pointer;
            transition: background .2s ease, color .2s ease, border-color .2s ease, transform .05s ease;
            align-items: center;
            justify-content: center;
            margin: 1rem auto;
            display: flex;
        }

        .news-btn:hover {
            background: #3b82f6;
            color: #fff;
            border-color: #3b82f6;
        }

        .news-btn:active {
            transform: translateY(1px);
        }

        .news-all {
            justify-self: start;
            display: inline-block;
            font-size: 13px;
            background: #3b82f6;
            color: #fff;
            padding: 10px 14px;
            border-radius: 8px;
            text-decoration: none;
            box-shadow: 0 6px 14px rgba(59, 130, 246, .25);
        }

        .news-all:hover {
            background: #2563eb;
        }

        .news-read {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #e5edff;
            color: #1e3a8a;
            text-decoration: none;
        }

        /* Kolom kanan: list ringkas */
        .news-list {
            display: grid;
            gap: 10px;
        }

        .news-card {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(16, 38, 84, .08);
            background: #000;
            height: 250px;
        }

        .news-card img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            opacity: .9;
            transition: transform .5s ease;
        }

        .news-card:hover img {
            transform: scale(1.03);
        }

        /* Overlay judul dan tombol */
        .news-card-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 14px;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, .45) 100%);
        }

        .news-card-title {
            margin: 0 0 8px 0;
            color: #fff;
            font-size: 14px;
            line-height: 1.45;
            font-weight: 700;
            text-shadow: 0 2px 8px rgba(0, 0, 0, .35);
        }

        .news-card-link {
            align-self: start;
            background: #3b82f6;
            color: #fff;
            text-decoration: none;
            font-size: 12px;
            padding: 8px 10px;
            border-radius: 8px;
            transition: background .2s ease;
        }

        .news-card-link:hover {
            background: #2563eb;
        }

        .agenda {
            max-width: 1100px;
            margin: 40px auto 80px;
            padding: 0 16px;
            color: #0f172a;
            font-family: 'Satoshi Variable', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
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

        .btn-ghost {
            display: inline-block;
            width: max-content;
            border: 1px solid #cbd5e1;
            color: #334155;
            background: #fff;
            padding: 10px 14px;
            border-radius: 10px;
            text-decoration: none;
            transition: background .2s ease, border-color .2s ease;
        }

        .btn-ghost:hover {
            background: #f4f7ff;
            border-color: #9db2ff;
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

        .form {
            text-align: center;
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

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .container-4 {
                grid-template-columns: 1fr;
            }

            .right {
                order: 2;
            }
        }

        @media (max-width: 992px) {
            nav {
                height: 60px;
            }

            nav ul {
                gap: 14px;
            }

            .small-img {
                right: 0;
            }

            .badge {
                bottom: -36px;
            }

            .news-grid {
                grid-template-columns: 1fr;
            }

            .agenda-grid {
                grid-template-columns: 1fr;
            }

            .tracer {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .hero {
                padding-top: 6rem;
            }

            .container {
                gap: 16px;
                margin-top: 24px;
            }

            .profile {
                flex-wrap: wrap;
            }

            .btn {
                margin-left: 0;
            }

            .news-card {
                height: 200px;
            }

            .promo-card {
                grid-template-columns: 1fr;
                row-gap: 10px;
            }

            .promo-img {
                width: 120px;
                justify-self: start;
            }

            .contact-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            nav ul {
                gap: 10px;
            }

            nav ul li a {
                font-size: 13px;
            }

            .container-2 {
                flex-direction: column;
                align-items: stretch;
            }

            .search,
            .daftar {
                width: 100%;
            }

            .small-img {
                display: none;
            }

            .badge {
                position: static;
                display: inline-block;
                margin-top: 10px;
            }

            .job-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .job-card>img {
                width: 100%;
                height: auto;
                border-radius: 10px;
            }

            .mitra-img img {
                width: 100px;
            }

            .ts-nav {
                bottom: 6px;
            }
        }
    </style>
@endsection

@section('content')
    <br><br><br>
    <div class="hero">
        <img src="{{ asset('image/Pattern.png') }}" alt="" width="200"
            style=" margin-top: -10rem;left: 0; position: absolute;">
        <img src="{{ asset('image/Pattern.png') }}" alt="" width="200"
            style=" margin-top: -1rem;left: 74rem; position: absolute; margin-top:-10rem; ">
        <h1>Cari Lowongan Kerja</h1>
        <div class="container-2">
            <div class="input">
                <input type="text" placeholder="Posisi/Perusaahaan" class="input1">
                <select>
                    <option selected disabled>Pilih Lokasi</option>
                    <option value="developer">Jember</option>
                    <option value="designer">Malang</option>
                    <option value="marketing">Surabaya</option>
                    <option value="manager">Sidoarjo</option>
                </select>
            </div>
            <a href="{{ route('lowongan.public') }}" class="search">Cari</a>
        </div><br>
        <p>Daftar Sekarang dan dapatkan pekerjaan secepatnya</p><br>
        <button class="daftar">Daftar Sekarang</button>
    </div>
    <div class="hero-student">
        <img src="{{ asset('image/hero.png') }}" alt="">
    </div>
    <div class="wave">
        <img src="{{ asset('image/Vector 46.png') }}" alt="" width="100%">
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
    </div>
    <img src="{{ asset('image/Vector 47.png') }}" alt="" style="margin-top: -2rem;" width="100%">
    <br><br><br><br>
    <section class="section-bkk" style="margin-top:-10rem;">
        <div class="container">
            <div class="row align-items-center">
                <!-- Kiri -->
                <div class="col-lg-6 mb-5 mb-lg-0 bkk-left">
                    <img src="{{ asset('image/Rectangle 463.png') }}" class="main-img" alt="Tim BKK">
                    <img src="{{ asset('image/Rectangle 464.png') }}" class="small-img" alt="Kerjasama">
                    <img src="{{ asset('image/Rectangle 464.png') }}" class="top-img" alt="Rapat">

                    <div class="bkk-badge">
                        <i class="fa-solid fa-medal"></i>
                        <div>
                            <h5 class="mb-0 fw-bold">1.000+</h5>
                            <p class="mb-0 small">Siswa Unggul</p>
                        </div>
                    </div>
                </div>

                <!-- Kanan -->
                <div class="col-lg-6 bkk-right">
                    <h2 class="mb-3">Tentang BKK</h2>
                    <p class="mb-4 text-muted">
                        BKK SMKN 6 Jember membantu siswa dan alumni menemukan peluang kerja sesuai kompetensi mereka.
                        Sebagai penghubung antara sekolah dan dunia industri, BKK menyediakan informasi lowongan, pelatihan,
                        dan program pengembangan keterampilan untuk mendukung karir lulusan.
                    </p>

                    <div class="bkk-feature">
                        <i class="fa-solid fa-briefcase"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Lowongan Kerja Terbaik</h6>
                            <p class="mb-0 small text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor.</p>
                        </div>
                    </div>

                    <div class="bkk-feature">
                        <i class="fa-solid fa-handshake"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Relasi Luas</h6>
                            <p class="mb-0 small text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor.</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="bkk-teacher">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Guru">
                            <div>
                                <h6 class="fw-bold mb-0">Audryan., S.Pd</h6>
                                <p class="text-muted small mb-0">Guru BKK</p>
                            </div>
                        </div>
                        <a href="#" class="btn btn-whatsapp">
                            <i class="fa-brands fa-whatsapp me-2"></i> Hubungi Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <br>
    <br>
    <br>
    <img src="{{ asset('image/Pattern.png') }}" alt="" width="200"
        style="left: 71.9rem;:flex-end; display: flex; position: absolute; margin-top:-8rem; ">
    <div class="container-4">

        <div class="left">
            <h2>Lowongan Pekerjaan</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>

            <div class="job-card">
                <div class="job-info">
                    <img src="{{ asset('image/Rectangle 444.png') }}" alt="Logo">
                    <div class="job-text">
                        <h3>Welding Leader | PT Yogya Presisi</h3>
                        <p>PT YOGYA PRESISI TEHNIKATAMA INDUSTRI <br>
                            Pendidikan: D3/S1 <br>
                            Jenis Kelamin: Laki-laki <br>
                            Lokasi: SLEMAN, INDONESIA</p>
                    </div>
                </div>
                <img src="{{ asset('image/Rectangle 445.png') }}" alt="">
            </div>

            <div class="job-card">
                <div class="job-info">
                    <img src="{{ asset('image/Rectangle 444 (1).png') }}" alt="Logo">
                    <div class="job-text">
                        <h3>Staf Crew | PT Duta Intibudimaya (MR DIY)</h3>
                        <p>PT DUTA INTIGUNA YASA (MR DIY) <br>
                            Pendidikan: SMA / SMK <br>
                            Jenis Kelamin: Laki-laki & Perempuan <br>
                            Lokasi: BLITAR, INDONESIA</p>
                    </div>
                </div>
                <img src="{{ asset('image/Rectangle 445.png') }}" alt="">
            </div>
            <div class="job-card">
                <div class="job-info">
                    <img src="{{ asset('image/Rectangle 444 (2).png') }}" alt="Logo">
                    <div class="job-text">
                        <h3>Salesman | PT INDOOFOOD ICBP</h3>
                        <p>PT INDOFOOD GROUP <br>
                            Pendidikan: SMA / SMK <br>
                            Jenis Kelamin: Laki-laki & Perempuan <br>
                            Lokasi: SURABAYA, INDONESIA</p>
                    </div>
                </div>
                <img src="{{ asset('image/Rectangle 445.png') }}" alt="">
            </div>
            <div class="job-card">
                <div class="job-info">
                    <img src="{{ asset('image/Rectangle 444 (3).png') }}" alt="Logo">
                    <div class="job-text">
                        <h3>Operator Pola | PT Duta Intibudimaya</h3>
                        <p>PT TUN HONG GARMENT INDONESIA <br>
                            Pendidikan: SMA / SMK <br>
                            Jenis Kelamin: Laki-laki & Perempuan <br>
                            Lokasi: BOYOLALI, INDONESIA</p>
                    </div>
                </div>
                <img src="{{ asset('image/Rectangle 445.png') }}" alt="">
            </div>

            <div class="job-card">
                <div class="job-info">
                    <img src="{{ asset('image/Rectangle 444 (4).png') }}" alt="Logo">
                    <div class="job-text">
                        <h3>Salesman | PT LAVILA KREATIV Perkasa</h3>
                        <p>PT LAVILLA KREATIF PERKASA <br>
                            Pendidikan: SMP / SLTP Sederajat <br>
                            Jenis Kelamin: Laki-laki <br>
                            Lokasi: GRESIK, INDONESIA</p>
                    </div>
                </div>
                <img src="{{ asset('image/Rectangle 445.png') }}" alt="">
            </div>
            <div class="btnnn">
                <button class="previous">Previous</button>
                <button class="next">Next</button>
            </div>
        </div>
        <!-- RIGHT SIDE -->
        <div class="right">
            <div class="containerprofile">
                <img src="{{ asset('image/Rectangle 447.png') }}" alt="Gambar Orang">
                <div class="content">
                    <ul class="steps">
                        <h3>Alur Pendaftaran Pekerjaan</h3>
                        <hr style="width: 320px;"><br>
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
                <div class="job">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=job1" alt="QR" ">
                            <div class="job-info2">
                                <p>Welding Leader | PT YOGYA PRESISI TEHNIKATAMA INDUSTRI<br> SLEMAN, INDONESIA</p>
                                <button>Lihat</button>
                            </div>
                        </div>
                        <div class="job">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=job2" alt="QR">
                            <div class="job-info2">
                                <p>Store Crew | PT DUTA INTIGUNA YASA (MR DIY)<br> BLITAR, INDONESIA</p>
                                <button>Lihat</button>
                            </div>
                        </div>


                        <div class="job">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=job4" alt="QR">
                            <div class="job-info2">
                                <p>Operator Pola | PT TUN HONG GARMENT INDONESIA<br> BOYOLALI, INDONESIA</p>
                                <button>Lihat</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mitra" id="mitra">
                <h2>Mitra Kami</h2>
                <p>Kami Telah Bekerja sama dengan <br>
                    Beberapa perushaan besar</p><br>
                <div class="mitra-img">
                    <img src="{{ asset('image/mitra1.png') }}" alt="" width="130">
                    <img src="{{ asset('image/mitra2.png') }}" alt="" width="130">
                    <img src="{{ asset('image/mitra3.png') }}" alt="" width="130">
                    <img src="{{ asset('image/mitra4.png') }}" alt="" width="130">
                    <img src="{{ asset('image/mitra5.png') }}" alt="" width="130">
                </div>
            </div>
            <div class="testimoni">
                <h2>Testimoni ALumni</h2>
                <p>Yuk intip apa kata alumni tentang BKK</p>
            </div>
            <section class="ts-wrapper" id="testimoni-slider">
                <div class="ts-viewport">
                    <div class="ts-track" role="list">
                        <!-- Card 1 -->
                        <article class="ts-card left" role="listitem" aria-label="Testimoni 1">
                            <div class="ts-avatar">HD</div>
                            <div class="ts-name">Helena Dwi Hapsari</div>
                            <div class="ts-role">Alumni RPL, Angkatan 2022 · CEO Gojek</div>
                            <div class="ts-stars" aria-label="Rating 5 dari 5">★★★★★ <span class="ts-score">5.0</span></div>
                            <p class="ts-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore.</p>
                        </article>

                        <!-- Card 2 (aktif) -->
                        <article class="ts-card active" role="listitem" aria-label="Testimoni 2">
                            <div class="ts-avatar">HD</div>
                            <div class="ts-name">Helena Dwi Hapsari</div>
                            <div class="ts-role">Alumni RPL, Angkatan 2022 · CEO Gojek</div>
                            <div class="ts-stars" aria-label="Rating 5 dari 5">★★★★★ <span class="ts-score">5.0</span></div>
                            <p class="ts-desc">Program BKK sangat membantu. Jaringan industrinya luas dan prosesnya rapi.</p>
                        </article>

                        <!-- Card 3 -->
                        <article class="ts-card right" role="listitem" aria-label="Testimoni 3">
                            <div class="ts-avatar">HD</div>
                            <div class="ts-name">Helena Dwi Hapsari</div>
                            <div class="ts-role">Alumni RPL, Angkatan 2022</div>
                            <div class="ts-stars" aria-label="Rating 5 dari 5">★★★★★ <span class="ts-score">5.0</span></div>
                            <p class="ts-desc">Dari pelatihan hingga penempatan kerja, semuanya terarah dan efektif.</p>
                        </article>

                        <!-- Card 4 -->
                        <article class="ts-card right" role="listitem" aria-label="Testimoni 4">
                            <div class="ts-avatar">HD</div>
                            <div class="ts-name">Helena Dwi Hapsari</div>
                            <div class="ts-role">Alumni RPL, Angkatan 2022</div>
                            <div class="ts-stars" aria-label="Rating 5 dari 5">★★★★★ <span class="ts-score">5.0</span></div>
                            <p class="ts-desc">Rekomendasi banget untuk siswa yang ingin cepat kerja.</p>
                        </article>
                    </div>

                    <div class="ts-nav">
                        <button class="ts-btn ts-prev" aria-label="Sebelumnya">‹</button>
                        <div class="ts-dots" aria-hidden="true"></div>
                        <button class="ts-btn ts-next" aria-label="Berikutnya">›</button>
                    </div>
                </div>
            </section>
            <section class="tracer-study">
                <h2>Tracer Study</h2>
            <div class="container">

                  @if ($tracerData->isNotEmpty())
                    <div class="chart-legend-wrapper">
                        <!-- Chart -->
                        <div class="chart-container">
                            <canvas id="tracerChart"></canvas>
                        </div>

                        <!-- Legend -->
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
                <br>
                <br>
                <p>
                    Data ini setiap tahun akan berubah sesuai dengan website ini
                    <a href="https://tracervokasi.kemendikdasmen.go.id/" target="_blank"
                        class="text-blue-600 hover:underline">
                        https://tracervokasi.kemendikdasmen.go.id/
                    </a>.
                </p>
                </section>


                {{-- <section class="tracer">
        <img src="{{ asset('image/diagram.png') }}" alt="Diagram Tracer Study">
        <div class="tracer-content">
            <h1>Tracer Study</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p><br>
            <a href="" class="detail">Selengkapnya</a>
        </div>
    </section> --}}
                <section class="agenda" aria-labelledby="agenda-title">
                    <div class="agenda-header">
                        <h2 id="agenda-title">Agenda</h2>
                    </div>
                    <div class="agenda-grid">
                        <div class="agenda-list">
                            <article class="agenda-item">
                                <img src="{{ asset('image/Rectangle 463.png') }}" alt="Tim sedang rapat">
                                <div class="agenda-body">
                                    <h3 class="agenda-title">Job Fair 50 Perusahaan</h3>
                                    <p class="agenda-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod
                                        tempor.</p>
                                    <div class="agenda-actions">
                                        <a href="#" class="btn-primary">Pre Registrasi</a>
                                        <span class="agenda-date">Senin, 12 Agustus 2025</span>
                                    </div>
                                </div>
                            </article>

                            <!-- Item 2 -->
                            <article class="agenda-item">
                                <img src="{{ asset('image/Rectangle 463.png') }}" alt="Tim sedang rapat">
                                <div class="agenda-body">
                                    <h3 class="agenda-title">Bussines Show</h3>
                                    <p class="agenda-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod
                                        tempor.</p>
                                    <div class="agenda-actions">
                                        <a href="#" class="btn-primary">Pre Registrasi</a>
                                        <span class="agenda-date">Senin, 19 Agustus 2025</span>
                                    </div>
                                </div>
                            </article>

                            <!-- Item 3 -->
                            <article class="agenda-item">
                                <img src="{{ asset('image/Rectangle 463.png') }}" alt="Tim sedang rapat">
                                <div class="agenda-body">
                                    <h3 class="agenda-title">Workshop Bareng Google</h3>
                                    <p class="agenda-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod
                                        tempor.</p>
                                    <div class="agenda-actions">
                                        <a href="#" class="btn-primary">Pre Registrasi</a>
                                        <span class="agenda-date">Senin, 26 Agustus 2025</span>
                                    </div>
                                </div>
                            </article>

                            <a href="#" class="btn-ghost all-agenda">Lihat Semua Agenda</a>
                        </div>

                        <!-- Kanan: Featured + Promo -->
                        <aside class="agenda-side">
                            <article class="feature-card">
                                <figure class="feature-media">
                                    <img src="{{ asset('image/Rectangle 511.png') }}" alt="Webinar bersama tim">
                                </figure>
                                <div class="feature-body">
                                    <h3 class="feature-title">Webinar Bareng Sam Altman, Krisis Teknologi dalam Dunia
                                        Bisnis</h3>
                                    <p class="feature-meta">BKK SMKN 6 JEMBER</p>
                                    <a href="#" class="btn-secondary">Tonton Video</a>
                                </div>
                            </article>

                            <article class="promo-card">
                                <div class="promo-body">
                                    <h4 class="promo-title">Bingung Nyari Kerja?</h4>
                                    <p class="promo-meta">Panduan langkah demi langkah di BKK</p>
                                    <a href="#" class="btn-secondary light">Selengkapnya</a>
                                </div>
                                <img class="promo-img" src="{{ asset('image/image 110.png') }}"
                                    alt="Ilustrasi siswa membawa buku">
                            </article>
                        </aside>
                    </div>

                </section>
                <section class="contact-section">
                    <h2>Kontak</h2>
                    <p>Hubungi Kami Kapan Saja</p>

                    <div class="contact-container">
                        <!-- Form -->
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
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>

                            <p class="address">
                                <i class="fas fa-map-marker-alt"></i>
                                RCVP+R39, Jl. PB.Sudirman, Tekoan,
                                Tanggul Kulon, Kec. Tanggul, Kabupaten Jember, Jawa Timur 68155
                            </p>

                            <p><b>Hubungi Kami</b></p>
                            <div class="social-links">
                                <img src="{{ asset('image/image 107.png') }}" alt="">
                                <img src="{{ asset('image/image 108.png') }}" alt="">
                                <img src="{{ asset('image/image 109.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
            @endsection

            @section('scripts')
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
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
                                        }, // legend manual
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
