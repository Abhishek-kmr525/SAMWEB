<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sam&reg;&#65039; Sustained Acoustic Medicine | Clinically Proven. Drug-Free Healing.</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <style>
    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --green: #c2d500;
      --green-light: #c2d500;
      --green-bg: #f0fdf4;
      --green-pale: #dcfce7;
      --black: #000000;
      --ink: #0c1118;
      --gray-900: #111827;
      --gray-700: #374151;
      --gray-500: #939598;
      --gray-300: #d1d5db;
      --gray-100: #f3f4f6;
      --gray-50: #f9fafb;
      --white: #ffffff;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--white);
      color: var(--black);
      overflow-x: hidden;
    }

    /* HEADER & SUPERMENU */
    header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 100;
      display: grid;
      grid-template-columns: 1fr auto 1fr;
      align-items: center;
      padding: 24px 56px;
      pointer-events: none;
    }

    .header-logo {
      pointer-events: auto;
      justify-self: start;
    }

    .header-logo img {
      height: 48px;
    }

    /* FLOATING PILL */
    .nav-pill {
      pointer-events: auto;
      justify-self: center;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(20px);
      border: 1px solid var(--gray-300);
      border-radius: 100px;
      padding: 0 16px;
      display: flex;
      align-items: center;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .nav-links {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .nav-links>li {
      position: relative;
    }

    .nav-links>li>a {
      color: var(--gray-700);
      text-decoration: none;
      font-size: 13px;
      font-weight: 900;
      padding: 16px 20px;
      display: block;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      transition: color 0.2s;
    }

    .nav-links>li>a:hover {
      color: var(--green);
    }

    /* DROPDOWNS */
    .dropdown {
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%) translateY(10px);
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(24px);
      border: 1px solid var(--gray-300);
      border-radius: 16px;
      padding: 12px 0;
      min-width: 220px;
      opacity: 0;
      visibility: hidden;
      transition: all 0.2s ease;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .nav-links>li:hover>.dropdown {
      opacity: 1;
      visibility: visible;
      transform: translateX(-50%) translateY(0);
    }

    .dropdown li {
      position: relative;
      display: block;
    }

    .dropdown a {
      color: var(--gray-700);
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      padding: 10px 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: all 0.2s;
    }

    .dropdown a:hover {
      color: var(--green);
      background: var(--gray-50);
    }

    .dropdown .sub-dropdown {
      position: absolute;
      top: -12px;
      left: 100%;
      transform: translateX(10px);
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(24px);
      border: 1px solid var(--gray-300);
      border-radius: 16px;
      padding: 12px 0;
      min-width: 200px;
      opacity: 0;
      visibility: hidden;
      transition: all 0.2s ease;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .dropdown li:hover>.sub-dropdown {
      opacity: 1;
      visibility: visible;
      transform: translateX(4px);
    }

    /* HERO */
    .product-hero {
      position: relative;
      min-height: 100vh;
      padding: 128px 56px 190px;
      background: linear-gradient(90deg, var(--ink) 0 54%, var(--white) 54% 100%);
      display: grid;
      align-items: center;
    }

    .hero-shell {
      max-width: 1280px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 0.82fr 1.18fr;
      gap: 60px;
      align-items: center;
    }

    #heroLeft {
      opacity: 0;
      transform: translateY(30px);
    }

    #heroRight {
      opacity: 0;
      transform: translateX(30px);
    }

    .hero-copy {
      color: var(--white);
    }

    .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      color: var(--green);
      border: 1px solid rgba(194, 213, 0, 0.45);
      border-radius: 100px;
      padding: 7px 15px;
      font-size: 12px;
      font-weight: 900;
      letter-spacing: 0.11em;
      text-transform: uppercase;
      margin-bottom: 28px;
    }

    .hero-title {
      font-size: clamp(38px, 4.5vw, 64px);
      font-weight: 900;
      line-height: 1.08;
      letter-spacing: -0.03em;
      margin-bottom: 26px;
    }

    .hero-title span {
      color: var(--green);
    }

    .hero-copy p {
      color: rgba(255, 255, 255, 0.68);
      font-size: 18px;
      line-height: 1.75;
      max-width: 550px;
      margin-bottom: 38px;
    }

    .hero-actions {
      display: flex;
      flex-wrap: nowrap;
      gap: 14px;
      align-items: center;
      justify-content: flex-start;
      width: 100%;
      max-width: 760px;
    }

    .eou-box {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      /* width: 170px; */
      height: 128px;
      /* padding: 12px 16px; */
      /* border: 2px solid rgba(255, 255, 255, 0.2); */
      border: none;
      border-radius: 8px;
      flex: 0 0 auto;
      background: transparent;
    }

    .eou-box img {
      /* display: block; */
      display: block;
      max-height: 108px;
      width: auto;
    }

    .hero-actions .btn-primary,
    .hero-actions .btn-outline {
      flex: 0 0 auto;
    }

    @media (max-width: 980px) {
      .hero-actions {
        flex-wrap: wrap;
        max-width: 100%;
      }
    }

    .btn-primary,
    .btn-outline,
    .btn-dark,
    .btn-bordered {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 48px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 15px;
      font-weight: 850;
      transition: all 0.2s;
    }

    .btn-primary {
      background: var(--green);
      color: var(--black);
      padding: 14px 30px;
      box-shadow: 0 8px 28px rgba(194, 213, 0, 0.25);
      border: none;
      cursor: pointer;
    }

    .btn-primary:hover {
      background: #b0c200;
      transform: translateY(-1px);
    }

    .btn-outline {
      color: var(--white);
      border: 2px solid rgba(255, 255, 255, 0.2);
      padding: 12px 28px;
    }

    .btn-outline:hover {
      border-color: var(--white);
      background: rgba(255, 255, 255, 0.08);
      color: var(--white);
    }

    .product-stage {
      position: relative;
      min-height: 610px;
    }

    .video-frame {
      position: relative;
      border-radius: 28px;
      overflow: hidden;
      border: 10px solid var(--white);
      box-shadow: 0 34px 90px rgba(0, 0, 0, 0.22);
      aspect-ratio: 16 / 10;
      background: var(--black);
    }

    .video-frame video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .device-tag {
      position: absolute;
      top: 26px;
      left: -24px;
      background: var(--white);
      border: 1px solid var(--gray-100);
      border-radius: 16px;
      padding: 18px 22px;
      box-shadow: 0 20px 45px rgba(0, 0, 0, 0.14);
    }

    .device-tag strong {
      display: block;
      color: var(--black);
      font-size: 28px;
      line-height: 1;
    }

    .device-tag span {
      display: block;
      color: var(--gray-500);
      font-size: 12px;
      font-weight: 800;
      margin-top: 6px;
    }

    .spec-strip {
      position: absolute;
      left: 50%;
      bottom: 34px;
      width: min(1180px, calc(100% - 112px));
      transform: translateX(-50%);
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      background: rgba(255, 255, 255, 0.96);
      backdrop-filter: blur(24px);
      border-radius: 20px;
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(0, 0, 0, 0.04);
      z-index: 4;
    }

    .spec-item {
      padding: 24px 32px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
      text-align: left;
    }

    @media (min-width: 901px) {
      .spec-item:not(:last-child)::after {
        content: "";
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        height: 48px;
        width: 1px;
        background: rgba(0, 0, 0, 0.08);
      }
    }

    .spec-item b {
      display: flex;
      align-items: center;
      gap: 12px;
      color: var(--ink);
      font-size: 34px;
      font-weight: 900;
      line-height: 1;
      margin-bottom: 8px;
      letter-spacing: -0.04em;
    }

    .spec-item b::before {
      content: "";
      display: block;
      width: 6px;
      height: 24px;
      border-radius: 6px;
      background: var(--green);
    }

    .spec-item small {
      display: block;
      color: var(--gray-500);
      font-size: 13px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    /* TRUST BAR */
    .trust-bar {
      background: var(--gray-900);
      padding: 56px 48px;
    }

    .trust-bar-inner {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      align-items: stretch;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    .trust-item {
      display: flex;
      align-items: center;
      gap: 16px;
      color: var(--white);
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 16px;
      padding: 20px 24px;
      flex: 0 1 calc(33.333% - 14px);
      min-width: 280px;
      max-width: 380px;
      opacity: 0;
      transform: translateY(15px);
      transition: all 0.3s ease;
    }

    .trust-item:hover {
      background: rgba(255, 255, 255, 0.08);
      border-color: rgba(255, 255, 255, 0.2);
    }

    .trust-item-icon {
      font-size: 28px;
    }

    .trust-item-text {
      font-size: 15px;
      font-weight: 700;
      color: var(--white);
      margin-bottom: 2px;
    }

    .trust-item-sub {
      font-size: 12px;
      color: rgba(255, 255, 255, 0.6);
      font-weight: 500;
      line-height: 1.4;
    }

    .section-tag {
      color: var(--green);
      font-size: 16px;
      font-weight: 700;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      margin-bottom: 12px;
    }

    .section-title {
      font-size: clamp(30px, 3.5vw, 48px);
      font-weight: 800;
      letter-spacing: -0.025em;
      color: var(--black);
    }

    /* CLINICAL SECTION */
    .clinical-section {
      padding: 100px 56px;
      background: var(--white);
    }

    .clinical-inner {
      max-width: 1100px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px;
      align-items: start;
    }

    .clinical-content {
      opacity: 0;
      transform: translateY(30px);
    }

    .evidence-list {
      display: flex;
      flex-direction: column;
      gap: 20px;
      margin-top: 40px;
    }

    .evidence-item {
      display: flex;
      gap: 16px;
      padding: 24px;
      border-radius: 14px;
      background: var(--gray-50);
      border: 1px solid var(--gray-100);
      transition: all 0.25s;
      cursor: default;
    }

    .evidence-item:hover {
      background: var(--green-bg);
      border-color: var(--green-pale);
    }

    .evidence-num {
      min-width: 48px;
      height: 48px;
      background: var(--green);
      color: var(--white);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 18px;
    }

    .evidence-title {
      font-size: 16px;
      font-weight: 700;
      margin-bottom: 4px;
      color: var(--black);
    }

    .evidence-desc {
      font-size: 14px;
      color: var(--gray-500);
      line-height: 1.5;
    }

    .clinical-image {
      opacity: 0;
      transform: translateX(30px);
      background: var(--green);
      border-radius: 32px;
      padding: 32px;
      position: relative;
      box-shadow: 0 20px 60px rgba(194, 213, 0, 0.15);
    }

    .clinical-image::before {
      content: '';
      position: absolute;
      inset: 0;
      background-image: radial-gradient(rgba(0, 0, 0, 0.1) 4px, transparent 4px);
      background-size: 40px 40px;
      opacity: 1;
      z-index: 0;
      border-radius: 32px;
      pointer-events: none;
    }

    .clinical-img-wrap {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
      margin-bottom: 24px;
      position: relative;
      z-index: 1;
    }

    .clinical-img-wrap img,
    .clinical-img-wrap video {
      width: 100%;
      height: 320px;
      object-fit: cover;
      display: block;
    }

    .clinical-image-wrapper {
      position: relative;
      z-index: 1;
    }

    .award-cards {
      display: flex;
      flex-direction: column;
      gap: 14px;
      position: relative;
      z-index: 1;
    }

    .award-card {
      display: flex;
      gap: 14px;
      align-items: center;
      padding: 16px 20px;
      background: var(--white);
      border: 1px solid var(--white);
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
      opacity: 0;
      transform: translateY(40px);
      transition: box-shadow 0.3s, border-color 0.3s;
    }

    .award-card:hover {
      transform: translateY(-4px) !important;
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.12);
    }

    .award-title {
      font-size: 14px;
      font-weight: 700;
      color: var(--black);
      margin-bottom: 2px;
    }

    .award-desc {
      font-size: 12px;
      color: var(--gray-500);
    }



    /* USE CASES */
    .usecases-section {
      background: var(--gray-50);
      padding: 100px 56px;
    }

    .usecases-inner {
      max-width: 1100px;
      margin: 0 auto;
    }

    .usecases-header {
      text-align: center;
      margin-bottom: 56px;
    }

    .usecases-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
    }

    .usecase-card {
      background: var(--white);
      border-radius: 16px;
      overflow: hidden;
      border: 1px solid var(--gray-100);
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
      transition: all 0.3s;
      opacity: 0;
      transform: translateY(30px);
    }

    .usecase-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 48px rgba(0, 0, 0, 0.1);
      border-color: var(--green-pale);
    }

    .usecase-img {
      height: 200px;
      overflow: hidden;
    }

    .usecase-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 0.4s;
    }

    .usecase-card:hover .usecase-img img {
      transform: scale(1.05);
    }

    .usecase-body {
      padding: 28px;
    }

    .usecase-tag {
      display: inline-block;
      background: var(--green-bg);
      color: var(--green);
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      padding: 4px 12px;
      border-radius: 100px;
      margin-bottom: 12px;
    }

    .usecase-body h3 {
      font-size: 18px;
      font-weight: 800;
      margin-bottom: 8px;
      color: var(--black);
    }

    .usecase-body p {
      font-size: 14px;
      color: var(--gray-500);
      line-height: 1.6;
    }

    /* TESTIMONIAL STRIP */
    .testi-strip {
      background: var(--white);
      padding: 100px 56px;
    }

    .testi-inner {
      max-width: 1100px;
      margin: 0 auto;
    }

    .testi-header {
      text-align: center;
      margin-bottom: 56px;
    }

    .testi-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
    }

    .testi-card {
      background: var(--gray-50);
      border: 1px solid var(--gray-100);
      border-radius: 16px;
      padding: 32px;
      transition: all 0.3s;
      opacity: 0;
      transform: translateY(30px);
    }

    .testi-card:hover {
      background: var(--green-bg);
      border-color: var(--green-pale);
      transform: translateY(-4px);
    }

    .testi-stars {
      color: var(--green);
      font-size: 16px;
      margin-bottom: 14px;
      letter-spacing: 2px;
    }

    .testi-text {
      font-size: 15px;
      color: var(--gray-700);
      line-height: 1.7;
      margin-bottom: 20px;
      font-style: italic;
    }

    .testi-name {
      font-size: 14px;
      font-weight: 700;
      color: var(--black);
    }

    .testi-role {
      font-size: 13px;
      color: var(--gray-500);
    }

    /* CTA SECTION */
    .cta-section {
      background: var(--black);
      padding: 120px 56px;
      text-align: center;
    }

    .cta-inner {
      max-width: 700px;
      margin: 0 auto;
    }

    .cta-section h2 {
      font-size: clamp(32px, 4vw, 56px);
      font-weight: 900;
      color: var(--white);
      letter-spacing: -0.03em;
      margin-bottom: 20px;
    }

    .cta-section p {
      font-size: 18px;
      color: #94a3b8;
      line-height: 1.6;
      margin-bottom: 44px;
    }

    .cta-btns {
      display: flex;
      gap: 16px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .btn-white {
      background: var(--green);
      color: var(--black);
      padding: 16px 36px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.2s;
      box-shadow: 0 4px 12px rgba(194, 213, 0, 0.15);
    }

    .btn-white:hover {
      background: #b0c200;
      box-shadow: 0 8px 24px rgba(194, 213, 0, 0.3);
      transform: translateY(-1px);
    }

    .btn-bordered {
      background: transparent;
      color: var(--white);
      border: 2px solid rgba(255, 255, 255, 0.25);
      padding: 16px 36px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 900;
      text-decoration: none;
      transition: all 0.2s;
    }

    .btn-bordered:hover {
      border-color: var(--white);
      background: rgba(255, 255, 255, 0.07);
    }

    .brochure-menu {
      position: relative;
      display: inline-flex;
    }

    .brochure-options {
      position: absolute;
      left: 50%;
      bottom: calc(100% + 10px);
      transform: translateX(-50%) translateY(8px);
      min-width: 270px;
      padding: 10px;
      border-radius: 12px;
      border: 1px solid rgba(255, 255, 255, 0.18);
      background: rgba(12, 17, 24, 0.96);
      box-shadow: 0 18px 44px rgba(0, 0, 0, 0.25);
      opacity: 0;
      visibility: hidden;
      transition: all 0.2s;
      z-index: 5;
    }

    .brochure-menu:hover .brochure-options,
    .brochure-menu:focus-within .brochure-options {
      opacity: 1;
      visibility: visible;
      transform: translateX(-50%) translateY(0);
    }

    .brochure-options a {
      display: block;
      color: var(--white);
      padding: 10px 12px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      font-weight: 650;
      text-align: left;
    }

    .brochure-options a:hover,
    .brochure-options a:focus {
      background: rgba(255, 255, 255, 0.08);
      color: var(--green);
    }

    footer {
      background: var(--gray-900);
      padding: 40px 56px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 16px;
      border-top: 1px solid rgba(255, 255, 255, 0.08);
    }

    .footer-logo img {
      height: 30px;
      opacity: 0.6;
    }

    .footer-copy {
      color: #6b7280;
      font-size: 13px;
    }

    .footer-links a {
      color: #6b7280;
      text-decoration: none;
      font-size: 13px;
      margin-left: 24px;
      transition: color 0.2s;
    }

    .footer-links a:hover {
      color: var(--white);
    }

    @media (max-width: 900px) {
      nav {
        padding: 0 24px;
      }

      .nav-links {
        display: none;
      }

      .product-hero {
        background: var(--ink);
        min-height: auto;
        padding: 120px 24px 72px;
      }

      .hero-shell {
        grid-template-columns: 1fr;
      }

      .product-stage {
        min-height: auto;
        padding-bottom: 0;
      }

      .spec-strip {
        position: static;
        transform: none;
        width: 100%;
        grid-template-columns: repeat(2, 1fr);
        margin: 32px auto 0;
        background: transparent;
        box-shadow: none;
        gap: 12px;
      }

      .spec-item {
        background: rgba(255, 255, 255, 0.96);
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        padding: 20px 24px;
      }

      .hero-title {
        font-size: clamp(44px, 16vw, 64px);
      }

      .video-frame {
        border-width: 6px;
        border-radius: 22px;
        aspect-ratio: 16 / 11;
      }

      .device-tag {
        position: static;
        width: 100%;
        margin-top: 16px;
      }

      .clinical-inner {
        grid-template-columns: 1fr;
      }

      .usecases-grid {
        grid-template-columns: 1fr;
      }

      .testi-grid {
        grid-template-columns: 1fr;
      }

      .trust-bar {
        padding: 32px 24px;
      }

      .clinical-section,
      .usecases-section,
      .testi-strip {
        padding: 80px 24px;
      }

      .cta-section {
        padding: 80px 24px;
      }

      footer {
        flex-direction: column;
        padding: 32px 24px;
      }
    }

    @media (max-width: 760px) {
      .spec-strip {
        grid-template-columns: 1fr;
      }
    }
  </style>
  <link rel="icon" href="favicon-sam.png" type="image/png" />
</head>

<body>

  <!-- HEADER -->
  <?php include __DIR__ . '/includes/header.php'; ?>


  <!-- HERO -->
  <section class="product-hero">
    <div class="hero-shell">
      <div class="hero-copy" id="heroLeft">
        <div class="eyebrow">Global Medical Innovation Award Winner</div>
        <h1 class="hero-title">
          The prescription<br />
          that replaces<br />
          <span>pain medication.</span>
        </h1>
        <p>
          sam&reg; (Sustained Acoustic Medicine) is an FDA-cleared, drug-free wearable ultrasound therapy - clinically
          proven in 30+ studies to reduce pain, accelerate healing, and restore function.
        </p>
        <div class="hero-actions">
          <a href="assets/pdfs/MK-1199-00-Rev-A-SAM-General-Rx.pdf" class="btn-primary"
            target="_blank" rel="noopener">Get Your Prescription</a>
          <a href="clinical-studies.php" class="btn-outline">View Clinical Evidence</a>
          <div class="eou-box" aria-label="Ease of Use">
            <img src="https://pub-ce72dd6475514908a6d97cfa33c7af95.r2.dev/EOU-PMS-Web.png" alt="Ease of Use" />
          </div>
        </div>
      </div>
      <div class="product-stage" id="heroRight">
        <div class="video-frame">
          <video autoplay muted loop playsinline>
            <source src="assets/videos/01-SAM_HP_ProdFam-01A.mp4" type="video/mp4" />
          </video>
        </div>
        <div class="device-tag">
          <strong>sam&reg;</strong>
          <span>clinically proven</span>
        </div>
      </div>
    </div>
    <div class="spec-strip" aria-label="sam highlights">
      <div class="spec-item"><b>1M+</b><small>Knees Restored</small></div>
      <div class="spec-item"><b>30+</b><small>Clinical Studies</small></div>
      <div class="spec-item"><b>FDA</b><small>Cleared Device</small></div>
    </div>
  </section>

  <!-- TRUST BAR -->
  <div class="trust-bar">
    <div class="trust-bar-inner">
      <div class="trust-item"
        style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
        <div>
          <div class="trust-item-text">NIH &amp; DoD Funded</div>
          <div class="trust-item-sub">Government-backed research</div>
        </div>
      </div>
      <div class="trust-item"
        style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
        <div>
          <div class="trust-item-text">FDA-Cleared 2020</div>
          <div class="trust-item-sub">Prescription home-use approved</div>
        </div>
      </div>
      <div class="trust-item"
        style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
        <div>
          <div class="trust-item-text">30+ Clinical Studies</div>
          <div class="trust-item-sub">Peer-reviewed evidence</div>
        </div>
      </div>
      <div class="trust-item"
        style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
        <div>
          <div class="trust-item-text">Innovation Award</div>
          <div class="trust-item-sub">Global Medical Recognition</div>
        </div>
      </div>
      <div class="trust-item"
        style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
        <div>
          <div class="trust-item-text">Save Up to $30K</div>
          <div class="trust-item-sub">Vs. surgical procedures</div>
        </div>
      </div>
    </div>
  </div>

  <!-- CLINICAL -->
  <section class="clinical-section">
    <div class="clinical-inner">
      <div class="clinical-content" id="clinicalContent">
        <div class="section-tag">Clinical Evidence</div>
        <h2 class="section-title" style="font-size: clamp(28px,3vw,44px); margin-bottom: 12px;">Built on science. Proven
          in practice.</h2>
        <p style="color: var(--gray-500); font-size: 16px; line-height: 1.7;">sam&reg; was developed from research
          funded by the National Institutes of Health and the US Department of Defense. Every claim is backed by
          peer-reviewed evidence.</p>
        <div class="evidence-list">
          <div class="evidence-item">
            <div class="evidence-num">1</div>
            <div>
              <div class="evidence-title">Improved Soft Tissue Healing</div>
              <div class="evidence-desc">Multiple RCTs demonstrate significantly faster healing of tendons, ligaments,
                and muscles compared to control groups.</div>
            </div>
          </div>
          <div class="evidence-item">
            <div class="evidence-num">2</div>
            <div>
              <div class="evidence-title">Reduced Pain & Inflammation</div>
              <div class="evidence-desc">Patients report measurable pain reduction within weeks. Clinical markers of
                inflammation consistently lower after sam&reg; treatment.</div>
            </div>
          </div>
          <div class="evidence-item">
            <div class="evidence-num">3</div>
            <div>
              <div class="evidence-title">Faster Return to Work</div>
              <div class="evidence-desc">Real-world studies show significantly faster return-to-work rates for injured
                workers using sam&reg; versus conventional treatment.</div>
            </div>
          </div>
          <div class="evidence-item">
            <div class="evidence-num">4</div>
            <div>
              <div class="evidence-title">Proven Opioid Alternative</div>
              <div class="evidence-desc">Clinical studies confirm sam&reg; as a safe and effective alternative to opioid
                pain medication for chronic and acute conditions.</div>
            </div>
          </div>
        </div>
      </div>
      <div class="clinical-image" id="clinicalImage">
        <div class="clinical-image-wrapper">
          <div class="clinical-img-wrap">
            <video autoplay loop muted playsinline style="width: 100%; height: 100%; object-fit: cover;">
              <source src="https://pub-ce72dd6475514908a6d97cfa33c7af95.r2.dev/Work.mp4" type="video/mp4">
            </video>
          </div>
        </div>
        <div class="award-cards">
          <div class="award-card"
            style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
            <div>
              <div class="award-title">Global Medical Innovation Award</div>
              <div class="award-desc">International recognition for breakthrough non-invasive therapy</div>
            </div>
          </div>
          <div class="award-card"
            style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
            <div>
              <div class="award-title">CIMIT Prize for Primary Healthcare</div>
              <div class="award-desc">Awarded for advancing accessible, effective patient care</div>
            </div>
          </div>
          <div class="award-card"
            style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
            <div>
              <div class="award-title">National Institutes of Health Honoree</div>
              <div class="award-desc">Recognised by NIH for scientific impact and innovation</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- USE CASES -->
  <section class="usecases-section">
    <div class="usecases-inner">
      <div class="usecases-header">
        <div class="section-tag">Conditions Treated</div>
        <h2 class="section-title">Heal what's holding you back</h2>
      </div>
      <div class="usecases-grid">
        <div class="usecase-card">
          <div class="usecase-img">
            <img src="knee_runner.png"
              alt="Sports injury" />
          </div>
          <div class="usecase-body">
            <div class="usecase-tag">Sports Injuries</div>
            <h3>Get Back to Peak Performance</h3>
            <p>Sprains, strains, tendinopathy, and muscle tears - sam&reg; accelerates healing so athletes return to
              training faster, without drugs.</p>
          </div>
        </div>
        <div class="usecase-card">
          <div class="usecase-img">
            <img src="assets/Sam_3.0_Close-Up.png"
              alt="Chronic pain" />
          </div>
          <div class="usecase-body">
            <div class="usecase-tag">Chronic Pain</div>
            <h3>Find Lasting Relief</h3>
            <p>Chronic joint pain, arthritis, and degenerative conditions respond well to sam&reg;'s continuous
              ultrasound therapy - reducing pain and improving function over time.</p>
          </div>
        </div>
        <div class="usecase-card">
          <div class="usecase-img">
            <img src="assets/products/SAM_2.0_Hero.png" alt="Soft tissue" />
          </div>
          <div class="usecase-body">
            <div class="usecase-tag">Post-Operative Recovery</div>
            <h3>Recover Smarter</h3>
            <p>sam&reg; supports post-operative healing by reducing inflammation and accelerating tissue repair - a
              powerful complement to any surgical recovery plan.</p>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- TESTIMONIALS -->
  <section class="testi-strip">
    <div class="testi-inner">
      <div class="testi-header">
        <div class="section-tag">Patient Stories</div>
        <h2 class="section-title">Trusted by patients and doctors alike</h2>
      </div>
      <div class="testi-grid">
        <div class="testi-card">
          <div class="testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          <p class="testi-text">&quot;The sam&reg; device has helped me elevate my recovery process throughout the
            season. My sam&reg; device is lightweight, easy to use, and easy to pack for when we go on the road. Most
            weeks, I use it the night before games to make sure I am feeling my best the next day.&quot;</p>
          <div class="testi-name">Peyton McDaniel</div>
          <div class="testi-role">JMU Women's Basketball Player</div>
        </div>
        <div class="testi-card">
          <div class="testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          <p class="testi-text">&quot;So many veterans and athletes deal with chronic pain and turn to medication
            because they don't see another option. Tools like sam&reg; give us control. It's effective, safe, and helps
            the body heal naturally.&quot;</p>
          <div class="testi-name">Noah Galloway</div>
          <div class="testi-role">U.S. Army Veteran and Motivational Speaker</div>
        </div>
        <div class="testi-card">
          <div class="testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          <p class="testi-text">&quot;Athletes often have this need to do everything possible to make sure they can
            train and play, so having my own sam&reg; device to include in my recovery routines gives me that
            confidence.&quot;</p>
          <div class="testi-name">Ashley Hoffman</div>
          <div class="testi-role">Paris 2024 USA Field Hockey Olympian</div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-section">
    <div class="cta-inner">
      <h2>Start your drug-free recovery today.</h2>
      <p>Ask your healthcare provider for a sam&reg; prescription. Join over 300,000 patients who have chosen a smarter
        path to healing.</p>
      <div class="cta-btns">
        <a href="assets/pdfs/MK-1199-00-Rev-A-SAM-General-Rx.pdf"
          class="btn-white" target="_blank" rel="noopener">Get Your Prescription</a>
        <div class="brochure-menu">
          <a href="assets/pdfs/MK-1217-00-Rev-A-Breakthrough-Technology-Clinical-Brochure.pdf"
            class="btn-bordered" target="_blank" rel="noopener">Download Brochure</a>
        </div>
      </div>
    </div>
  </section>

  <?php include __DIR__ . '/includes/footer.php'; ?>


  <script>
    gsap.registerPlugin(ScrollTrigger);

    gsap.timeline({ delay: 0.3 })
      .to('#heroLeft', { opacity: 1, y: 0, duration: 0.8, ease: 'power3.out' })
      .to('#heroRight', { opacity: 1, x: 0, duration: 0.8, ease: 'power3.out' }, '-=0.5');

    // Trust bar
    document.querySelectorAll('.trust-item').forEach((el, i) => {
      gsap.to(el, {
        opacity: 1, y: 0, duration: 0.5, delay: i * 0.1,
        scrollTrigger: { trigger: '.trust-bar', start: 'top 85%' }
      });
    });

    gsap.to('#clinicalContent', {
      opacity: 1, y: 0, duration: 0.8,
      scrollTrigger: { trigger: '.clinical-section', start: 'top 70%' }
    });
    gsap.to('#clinicalImage', {
      opacity: 1, x: 0, duration: 0.8, delay: 0.2,
      scrollTrigger: { trigger: '.clinical-section', start: 'top 70%' }
    });
    document.querySelectorAll('.award-card').forEach((el, i) => {
      gsap.to(el, {
        opacity: 1, y: 0, duration: 0.6, delay: 0.5 + (i * 0.15), ease: "back.out(1.5)",
        scrollTrigger: { trigger: '.clinical-section', start: 'top 70%' }
      });
    });

    document.querySelectorAll('.usecase-card').forEach((el, i) => {
      gsap.to(el, {
        opacity: 1, y: 0, duration: 0.6, delay: i * 0.12,
        scrollTrigger: { trigger: '.usecases-section', start: 'top 75%' }
      });
    });
    document.querySelectorAll('.testi-card').forEach((el, i) => {
      gsap.to(el, {
        opacity: 1, y: 0, duration: 0.6, delay: i * 0.12,
        scrollTrigger: { trigger: '.testi-strip', start: 'top 75%' }
      });
    });
  </script>
  <script src="assets/header-config.js?v=20260911-1"></script>
</body>

</html>
