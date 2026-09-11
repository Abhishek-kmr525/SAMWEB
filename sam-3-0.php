<!DOCTYPE html>
<html lang="en">

<head>
  <?php include __DIR__ . '/includes/google-tag.php'; ?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>sam&reg; 3.0 | Sam&reg;&#65039; Sustained Acoustic Medicine</title>
  <meta name="description"
    content="Explore sam 3.0, the next evolution in wearable long-duration ultrasound therapy for everyday recovery, comfort, and performance." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
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
      --green-deep: #a7b900;
      --green-soft: #f6f9df;
      --green-pale: #e7ef9d;
      --black: #000000;
      --ink: #0c1118;
      --gray-900: #111827;
      --gray-700: #374151;
      --gray-500: #939598;
      --gray-300: #d1d5db;
      --gray-200: #e5e7eb;
      --gray-100: #f3f4f6;
      --gray-50: #f9fafb;
      --white: #ffffff;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: "Inter", sans-serif;
      color: var(--black);
      background: var(--white);
      overflow-x: hidden;
      line-height: 1.5;
    }

    a {
      color: inherit;
    }

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
      display: block;
    }

    .nav-pill {
      pointer-events: auto;
      justify-self: center;
      background: rgba(255, 255, 255, 0.92);
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
    }

    .nav-links>li {
      position: relative;
    }

    .nav-links>li>a {
      color: var(--gray-700);
      text-decoration: none;
      font-size: 13px;
      font-weight: 800;
      padding: 16px 18px;
      display: block;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      white-space: nowrap;
      transition: color 0.2s;
    }

    .nav-links>li>a:hover,
    .nav-links>li>a.active {
      color: var(--green-deep);
    }

    .dropdown {
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%) translateY(10px);
      background: rgba(255, 255, 255, 0.96);
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
      list-style: none;
    }

    .dropdown a {
      color: var(--gray-700);
      text-decoration: none;
      font-size: 14px;
      font-weight: 650;
      padding: 10px 24px;
      display: block;
      transition: all 0.2s;
    }

    .dropdown a:hover,
    .dropdown a.active {
      color: var(--green-deep);
      background: var(--gray-50);
    }

    .product-hero {
      position: relative;
      min-height: 100vh;
      padding: 128px 56px 110px;
      background:
        linear-gradient(90deg, var(--ink) 0 54%, var(--white) 54% 100%);
      display: grid;
      align-items: center;
    }

    .hero-shell {
      width: min(1280px, 100%);
      margin: 0 auto;
      display: grid;
      grid-template-columns: 0.82fr 1.18fr;
      gap: 60px;
      align-items: center;
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
      font-size: clamp(48px, 6.2vw, 92px);
      font-weight: 900;
      line-height: 0.96;
      letter-spacing: -0.04em;
      margin-bottom: 26px;
    }

    .hero-title span {
      color: var(--green);
    }

    .hero-copy p {
      color: rgba(255, 255, 255, 0.68);
      font-size: 18px;
      line-height: 1.75;
      max-width: 560px;
      margin-bottom: 38px;
    }

    .hero-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
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
    }

    .btn-primary:hover {
      background: var(--green-deep);
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
    }

    .btn-dark {
      background: var(--ink);
      color: var(--white);
      padding: 14px 30px;
    }

    .btn-bordered {
      border: 2px solid rgba(255, 255, 255, 0.25);
      color: var(--white);
      padding: 12px 28px;
    }

    .product-stage {
      position: relative;
      min-height: 610px;
    }

    .image-frame {
      position: relative;
      border-radius: 28px;
      overflow: hidden;
      border: 10px solid var(--white);
      box-shadow: 0 34px 90px rgba(0, 0, 0, 0.22);
      aspect-ratio: 16 / 10;
      background: var(--black);
      line-height: 0;
    }

    .image-frame img,
    .image-frame video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center center;
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
      grid-template-columns: repeat(4, 1fr);
      gap: 12px;
      padding: 16px;
      border-radius: 20px;
      background: var(--green);
      box-shadow: 0 22px 58px rgba(0, 0, 0, 0.18), 0 0 46px rgba(194, 213, 0, 0.34);
      border: 1px solid rgba(255, 255, 255, 0.82);
      z-index: 4;
    }

    .spec-pill {
      background: rgba(255, 255, 255, 0.72);
      border: 1px solid rgba(255, 255, 255, 0.78);
      border-radius: 12px;
      padding: 16px 14px 16px 46px;
      position: relative;
      min-height: 76px;
      overflow: hidden;
    }

    .spec-pill::before {
      content: attr(data-step);
      position: absolute;
      left: 14px;
      top: 16px;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      background: var(--ink);
      color: var(--green);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: 900;
      z-index: 1;
    }

    .spec-pill::after {
      content: "";
      position: absolute;
      right: -32px;
      bottom: -38px;
      width: 96px;
      height: 96px;
      border-radius: 50%;
      border: 18px solid rgba(0, 0, 0, 0.05);
    }

    .spec-pill b {
      display: block;
      color: var(--black);
      font-size: 13px;
      line-height: 1.25;
      margin-bottom: 4px;
      letter-spacing: -0.01em;
      position: relative;
      z-index: 1;
    }

    .spec-pill small {
      color: rgba(0, 0, 0, 0.62);
      font-size: 11px;
      line-height: 1.35;
      font-weight: 800;
      position: relative;
      z-index: 1;
    }

    .section {
      padding: 100px 56px;
    }

    .section.alt {
      background: var(--gray-50);
    }

    .section.dark {
      background: var(--ink);
      color: var(--white);
    }

    .inner {
      max-width: 1180px;
      margin: 0 auto;
    }

    .section-header {
      max-width: 760px;
      margin-bottom: 56px;
    }

    .section-header.center {
      margin-left: auto;
      margin-right: auto;
      text-align: center;
    }

    .section-tag {
      color: var(--green-deep);
      font-size: 13px;
      font-weight: 900;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      margin-bottom: 12px;
    }

    .dark .section-tag {
      color: var(--green);
    }

    .section-title {
      font-size: clamp(31px, 4vw, 54px);
      line-height: 1.05;
      font-weight: 900;
      letter-spacing: -0.035em;
    }

    .section-desc {
      color: var(--gray-500);
      font-size: 17px;
      line-height: 1.7;
      margin-top: 18px;
    }

    .dark .section-desc {
      color: rgba(255, 255, 255, 0.66);
    }

    .therapy-layout {
      display: grid;
      grid-template-columns: 0.95fr 1.05fr;
      gap: 54px;
      align-items: center;
    }

    .therapy-visual {
      border: 3px solid var(--green-pale);
      border-radius: 18px;
      padding: 6px;
      display: block;
      background: var(--white);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .therapy-plate {
      border-radius: 12px;
      overflow: hidden;
      position: relative;
      display: block;
      line-height: 0;
    }

    .therapy-plate img {
      display: block;
      width: 100%;
      height: auto;
      object-fit: cover;
      border-radius: 12px;
    }

    .therapy-plate::after {
      display: none;
    }

    .check-list {
      display: grid;
      gap: 16px;
    }

    .check-item {
      display: grid;
      grid-template-columns: 46px 1fr;
      gap: 16px;
      align-items: start;
      padding: 22px;
      background: var(--white);
      border: 1px solid var(--gray-100);
      border-radius: 16px;
    }

    .check {
      width: 46px;
      height: 46px;
      border-radius: 50%;
      background: var(--green);
      color: var(--black);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 900;
    }

    .check-item h3 {
      font-size: 17px;
      font-weight: 900;
      margin-bottom: 6px;
    }

    .check-item p {
      color: var(--gray-500);
      font-size: 14px;
      line-height: 1.6;
    }

    .feature-board {
      display: grid;
      grid-template-columns: 1.1fr 0.9fr;
      gap: 28px;
      align-items: stretch;
    }

    .feature-lead {
      background: var(--green);
      border-radius: 22px;
      padding: 42px;
      min-height: 410px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      overflow: hidden;
      position: relative;
    }

    .feature-lead::after {
      content: "";
      position: absolute;
      width: 420px;
      height: 420px;
      right: -160px;
      bottom: -160px;
      border-radius: 50%;
      border: 60px solid rgba(255, 255, 255, 0.28);
    }

    .feature-lead h2 {
      max-width: 580px;
      font-size: clamp(32px, 4vw, 56px);
      font-weight: 900;
      line-height: 1.02;
      letter-spacing: -0.04em;
      position: relative;
      z-index: 1;
    }

    .feature-lead p {
      max-width: 600px;
      color: rgba(0, 0, 0, 0.68);
      font-size: 17px;
      line-height: 1.65;
      position: relative;
      z-index: 1;
    }

    .feature-stack {
      display: grid;
      gap: 18px;
    }

    .feature-card {
      background: var(--white);
      border: 1px solid var(--green-pale);
      border-radius: 18px;
      padding: 28px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05), 0 0 0 1px rgba(194, 213, 0, 0.16), 0 0 34px rgba(194, 213, 0, 0.12);
      transition: transform 0.25s, box-shadow 0.25s;
    }

    .feature-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 18px 45px rgba(0, 0, 0, 0.08), 0 0 42px rgba(194, 213, 0, 0.2);
    }

    .feature-card h3 {
      font-size: 19px;
      font-weight: 900;
      margin-bottom: 10px;
      letter-spacing: -0.015em;
    }

    .feature-card p {
      color: var(--gray-500);
      font-size: 14px;
      line-height: 1.65;
    }

    .kit-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .kit-card {
      background: var(--white);
      border: 1px solid var(--gray-100);
      border-radius: 18px;
      padding: 28px;
      min-height: 238px;
      box-shadow: 0 8px 28px rgba(0, 0, 0, 0.05);
    }

    .kit-number {
      color: var(--green-deep);
      font-size: 42px;
      line-height: 1;
      font-weight: 900;
      margin-bottom: 18px;
    }

    .kit-card h3 {
      font-size: 18px;
      font-weight: 900;
      margin-bottom: 9px;
    }

    .kit-card p {
      color: var(--gray-500);
      font-size: 14px;
      line-height: 1.65;
    }

    .accessory-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 24px;
    }

    .accessory-card {
      border-radius: 22px;
      min-height: 330px;
      border: 1px solid rgba(255, 255, 255, 0.12);
      background: rgba(255, 255, 255, 0.05);
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }

    .accessory-media {
      height: 320px;
      background: var(--white);
      overflow: hidden;
      display: grid;
      place-items: center;
      padding: 18px;
    }

    .accessory-media img {
      width: 100%;
      height: 100%;
      display: block;
      object-fit: contain;
      transition: transform 0.35s;
    }

    .accessory-card:hover .accessory-media img {
      transform: scale(1.04);
    }

    .accessory-body {
      padding: 30px;
    }

    .accessory-card h3 {
      font-size: 26px;
      font-weight: 900;
      margin-bottom: 24px;
      letter-spacing: -0.025em;
    }

    .accessory-list {
      display: grid;
      gap: 14px;
      list-style: none;
    }

    .accessory-list li {
      color: rgba(255, 255, 255, 0.72);
      border-bottom: 1px solid rgba(255, 255, 255, 0.09);
      padding-bottom: 14px;
      font-size: 15px;
      line-height: 1.5;
    }

    .accessory-list li:last-child {
      border-bottom: 0;
      padding-bottom: 0;
    }

    .expert-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 22px;
    }

    .expert-card {
      background: var(--white);
      border: 1px solid var(--gray-100);
      border-radius: 18px;
      box-shadow: 0 8px 28px rgba(0, 0, 0, 0.05);
      overflow: hidden;
    }

    .expert-photo {
      height: 270px;
      overflow: hidden;
      background: var(--green-soft);
      display: grid;
      place-items: center;
      padding: 10px;
    }

    .expert-photo img {
      width: 100%;
      height: 100%;
      object-fit: contain;
      display: block;
    }

    .expert-body {
      padding: 30px;
    }

    .quote-mark {
      color: var(--green-deep);
      font-size: 52px;
      line-height: 0.7;
      font-weight: 900;
      margin-bottom: 18px;
    }

    .expert-card blockquote {
      color: var(--gray-700);
      font-size: 15px;
      line-height: 1.65;
      margin-bottom: 24px;
      font-weight: 650;
    }

    .expert-card h3 {
      font-size: 17px;
      font-weight: 900;
      margin-bottom: 4px;
    }

    .expert-card p {
      color: var(--gray-500);
      font-size: 13px;
      line-height: 1.55;
    }

    .faq-grid {
      display: grid;
      gap: 14px;
      max-width: 900px;
      margin: 0 auto;
    }

    .faq-item {
      background: var(--white);
      border: 1px solid var(--gray-200);
      border-radius: 14px;
      overflow: hidden;
    }

    .faq-trigger {
      width: 100%;
      padding: 22px 26px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
      background: none;
      border: 0;
      cursor: pointer;
      color: var(--black);
      text-align: left;
      font-family: inherit;
      font-size: 16px;
      font-weight: 850;
    }

    .faq-trigger span {
      color: var(--green-deep);
      font-size: 24px;
      line-height: 1;
    }

    .faq-content {
      padding: 0 26px 24px;
      color: var(--gray-500);
      font-size: 15px;
      line-height: 1.65;
      display: none;
    }

    .faq-item.active .faq-content {
      display: block;
    }

    .cta-section {
      background: var(--black);
      color: var(--white);
      padding: 110px 56px;
      text-align: center;
    }

    .cta-inner {
      max-width: 780px;
      margin: 0 auto;
    }

    .cta-section h2 {
      font-size: clamp(34px, 4vw, 58px);
      font-weight: 900;
      line-height: 1.06;
      letter-spacing: -0.035em;
      margin-bottom: 20px;
    }

    .cta-section p {
      color: #94a3b8;
      font-size: 18px;
      line-height: 1.65;
      margin-bottom: 40px;
    }

    .cta-btns {
      display: flex;
      justify-content: center;
      gap: 16px;
      flex-wrap: wrap;
    }

    .contact-form-container {
      max-width: 820px;
      margin: 46px auto 0;
      background: var(--white);
      border: 1px solid var(--gray-200);
      border-radius: 32px;
      padding: 54px;
      box-shadow: 0 32px 80px rgba(0, 0, 0, 0.22);
      text-align: left;
    }

    .contact-form-container h2 {
      color: var(--black);
      font-size: 32px;
      font-weight: 900;
      margin-bottom: 8px;
      letter-spacing: -0.02em;
    }

    .contact-form-container>p {
      color: var(--gray-500);
      font-size: 16px;
      margin-bottom: 40px;
      line-height: 1.6;
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
      margin-bottom: 24px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-bottom: 24px;
    }

    .form-group label {
      font-size: 14px;
      font-weight: 800;
      color: var(--gray-900);
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
      width: 100%;
      background: var(--white);
      border: 2px solid var(--gray-300);
      border-radius: 12px;
      padding: 16px 20px;
      font-size: 16px;
      color: var(--black);
      font-family: inherit;
      transition: all 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
      outline: none;
      border-color: var(--green);
      box-shadow: 0 0 0 4px rgba(194, 213, 0, 0.15);
    }

    .form-group textarea {
      resize: vertical;
      min-height: 160px;
    }

    .btn-submit {
      background: var(--green);
      color: var(--black);
      width: 100%;
      padding: 20px;
      border-radius: 12px;
      font-size: 18px;
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: 1px;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 16px 32px rgba(194, 213, 0, 0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      font-family: inherit;
    }

    .btn-submit:hover {
      background: var(--green-deep);
      transform: translateY(-4px);
      box-shadow: 0 24px 48px rgba(194, 213, 0, 0.3);
    }

    .thankyou-overlay {
      display: none;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 20px 0 10px;
      animation: fadeInUp 0.55s cubic-bezier(0.16, 1, 0.3, 1) both;
    }

    .thankyou-overlay.visible {
      display: flex;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(28px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .ty-icon-wrap {
      width: 88px;
      height: 88px;
      border-radius: 50%;
      background: var(--green);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 28px;
      box-shadow: 0 16px 40px rgba(194, 213, 0, 0.35);
    }

    .ty-icon-wrap svg {
      width: 44px;
      height: 44px;
      stroke: var(--black);
    }

    .thankyou-overlay h3 {
      color: var(--black);
      font-size: 30px;
      font-weight: 900;
      letter-spacing: -0.025em;
      margin-bottom: 14px;
    }

    .thankyou-overlay .ty-sub {
      color: var(--gray-500);
      font-size: 16px;
      line-height: 1.7;
      max-width: 380px;
      margin-bottom: 32px;
    }

    .thankyou-overlay .ty-note {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: var(--green-soft);
      border: 1px solid var(--green-pale);
      color: var(--green-deep);
      border-radius: 100px;
      padding: 10px 22px;
      font-size: 14px;
      font-weight: 700;
    }

    .btn-reset {
      margin-top: 28px;
      padding: 14px 32px;
      border-radius: 10px;
      background: transparent;
      border: 2px solid var(--gray-300);
      color: var(--gray-700);
      font-size: 15px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.2s;
      font-family: inherit;
    }

    .btn-reset:hover {
      border-color: var(--green);
      color: var(--green-deep);
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
      opacity: 0.65;
      display: block;
    }

    .footer-copy {
      color: #6b7280;
      font-size: 13px;
    }

    .footer-links {
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      gap: 18px 24px;
    }

    .footer-links a {
      color: #6b7280;
      text-decoration: none;
      font-size: 13px;
      transition: color 0.2s;
    }

    .footer-links a:hover {
      color: var(--white);
    }

    .social-links {
      display: flex;
      align-items: center;
      gap: 16px;
      padding-left: 22px;
      border-left: 1px solid rgba(255, 255, 255, 0.2);
    }

    .social-links a {
      display: flex;
      align-items: center;
      color: #6b7280;
    }

    /* REDESIGNED INTRO */
    .redesign-intro {
      position: relative;
      background: var(--gray-50);
      padding: 120px 56px;
    }

    .redesigned-panel {
      position: relative;
      z-index: 1;
      max-width: 960px;
      margin: 0 auto;
      text-align: center;
      background: var(--ink);
      border-radius: 40px;
      padding: 90px 70px;
      box-shadow: 0 40px 100px rgba(0, 0, 0, 0.15);
      transition: transform 0.5s ease, box-shadow 0.5s ease;
      overflow: hidden;
    }

    .redesigned-panel::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(194, 213, 0, 0.1) 0%, rgba(0,0,0,0) 60%);
      pointer-events: none;
      z-index: 0;
    }

    .redesigned-panel:hover {
      transform: translateY(-8px);
      box-shadow: 0 50px 120px rgba(0, 0, 0, 0.2);
    }

    .redesigned-panel > * {
      position: relative;
      z-index: 1;
    }

    .intro-badge {
      display: inline-block;
      padding: 10px 20px;
      border-radius: 100px;
      background: rgba(255, 255, 255, 0.08);
      color: var(--green);
      font-size: 13px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      margin-bottom: 36px;
      border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .intro-heading {
      font-size: clamp(28px, 4vw, 48px);
      font-weight: 800;
      line-height: 1.25;
      color: var(--white);
      letter-spacing: -0.02em;
      margin-bottom: 28px;
    }

    .text-gradient {
      background: linear-gradient(120deg, var(--green-pale), var(--green));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      display: inline-block;
    }

    .intro-subheading {
      font-size: 19px;
      line-height: 1.7;
      color: rgba(255, 255, 255, 0.7);
      max-width: 760px;
      margin: 0 auto 46px;
      font-weight: 400;
    }

    .intro-footer {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 24px;
    }

    .intro-line {
      height: 1px;
      width: 80px;
      background: rgba(255, 255, 255, 0.2);
    }

    .intro-footer strong {
      font-size: 17px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      color: var(--white);
    }

    @media (max-width: 760px) {
      .redesigned-panel {
        padding: 50px 30px;
        border-radius: 28px;
      }

      .intro-footer {
        flex-direction: column;
        gap: 16px;
      }

      .intro-line {
        display: none;
      }

      .redesign-intro {
        padding: 80px 24px;
      }
    }

    .highlight-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .highlight-card {
      background: var(--white);
      border: 1px solid var(--gray-100);
      border-radius: 18px;
      padding: 30px;
      min-height: 230px;
      box-shadow: 0 8px 28px rgba(0, 0, 0, 0.05);
    }

    .highlight-icon {
      width: 46px;
      height: 46px;
      border-radius: 14px;
      background: var(--green);
      color: var(--black);
      display: grid;
      place-items: center;
      font-weight: 900;
      margin-bottom: 24px;
    }

    .highlight-card h3 {
      font-size: 20px;
      font-weight: 900;
      letter-spacing: -0.02em;
      margin-bottom: 10px;
    }

    .highlight-card p {
      color: var(--gray-500);
      font-size: 14px;
      line-height: 1.65;
    }

    .recovery-panel {
      display: grid;
      grid-template-columns: 0.95fr 1.05fr;
      gap: 36px;
      align-items: stretch;
    }

    .recovery-copy {
      background: var(--green);
      border-radius: 22px;
      padding: 44px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      min-height: 390px;
    }

    .recovery-copy h2 {
      font-size: clamp(34px, 4vw, 58px);
      line-height: 1.02;
      font-weight: 900;
      letter-spacing: -0.04em;
      margin-bottom: 20px;
    }

    .recovery-copy p {
      color: rgba(0, 0, 0, 0.68);
      font-size: 17px;
      line-height: 1.65;
    }

    .audience-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 16px;
    }

    .audience-card {
      background:
        linear-gradient(135deg, rgba(255, 255, 255, 0.11), rgba(255, 255, 255, 0.045));
      border: 1px solid rgba(255, 255, 255, 0.14);
      border-radius: 18px;
      padding: 28px;
      color: var(--white);
      min-height: 188px;
      position: relative;
      overflow: hidden;
    }

    .audience-card::after {
      content: "";
      position: absolute;
      right: -46px;
      bottom: -48px;
      width: 132px;
      height: 132px;
      border-radius: 50%;
      border: 22px solid rgba(194, 213, 0, 0.12);
    }

    .audience-card b {
      color: var(--green);
      display: block;
      font-size: 12px;
      font-weight: 900;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      margin-bottom: 18px;
      position: relative;
      z-index: 1;
    }

    .audience-card h3 {
      font-size: 22px;
      line-height: 1.08;
      font-weight: 900;
      letter-spacing: -0.025em;
      margin-bottom: 12px;
      position: relative;
      z-index: 1;
    }

    .audience-card p {
      color: rgba(255, 255, 255, 0.66);
      font-size: 14px;
      line-height: 1.6;
      position: relative;
      z-index: 1;
    }

    .audience-card:nth-child(5) {
      grid-column: 1 / -1;
    }

    .video-panel {
      border-radius: 24px;
      overflow: hidden;
      background: var(--ink);
      min-height: 430px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      align-items: stretch;
      box-shadow: 0 24px 70px rgba(0, 0, 0, 0.18);
    }

    .video-art {
      position: relative;
      min-height: 430px;
      background:
        linear-gradient(135deg, rgba(194, 213, 0, 0.22), transparent 48%),
        url("https://samrecover.com/wp-content/uploads/2021/01/Sam_Headers_Products_3-1.jpg") center / cover;
    }

    .play-button {
      position: absolute;
      inset: 0;
      margin: auto;
      width: 86px;
      height: 86px;
      border-radius: 50%;
      border: 0;
      background: var(--green);
      color: var(--black);
      display: grid;
      place-items: center;
      font-size: 32px;
      font-weight: 900;
      box-shadow: 0 18px 44px rgba(0, 0, 0, 0.25);
    }

    .video-copy {
      color: var(--white);
      padding: 56px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .video-copy h2 {
      font-size: clamp(32px, 4vw, 52px);
      line-height: 1.04;
      font-weight: 900;
      letter-spacing: -0.035em;
      margin-bottom: 18px;
    }

    .video-copy p {
      color: rgba(255, 255, 255, 0.68);
      font-size: 17px;
      line-height: 1.7;
    }

    @media (max-width: 1080px) {
      header {
        padding: 20px 28px;
        grid-template-columns: auto 1fr;
      }

      .nav-pill {
        justify-self: end;
        max-width: calc(100vw - 160px);
        overflow-x: auto;
        border-radius: 18px;
      }

      .nav-links>li>a {
        padding: 14px 13px;
        font-size: 11px;
      }

      .product-hero {
        background: var(--ink);
        min-height: auto;
      }

      .hero-shell,
      .feature-board,
      .therapy-layout,
      .recovery-panel,
      .video-panel {
        grid-template-columns: 1fr;
      }

      .product-stage {
        min-height: auto;
        padding-bottom: 0;
      }

      .kit-grid,
      .expert-grid,
      .highlight-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 760px) {
      header {
        position: absolute;
        padding: 22px 20px;
        display: flex;
        justify-content: space-between;
      }

      .header-logo img {
        height: 42px;
      }

      .nav-pill {
        display: none;
      }

      .product-hero {
        padding: 112px 22px 72px;
      }

      .section,
      .section.dark,
      .cta-section {
        padding: 76px 22px;
      }

      .hero-title {
        font-size: clamp(44px, 16vw, 64px);
      }

      .image-frame {
        border-width: 6px;
        border-radius: 22px;
        aspect-ratio: 16 / 11;
      }

      .device-tag {
        position: static;
        width: 100%;
        margin-top: 16px;
      }

      .feature-lead {
        padding: 30px;
        min-height: 360px;
      }

      .recovery-copy,
      .video-copy {
        padding: 32px 24px;
      }

      .audience-grid {
        grid-template-columns: 1fr;
      }

      .audience-card:nth-child(5) {
        grid-column: auto;
      }

      .video-art {
        min-height: 300px;
      }

      .therapy-visual {
        padding: 18px;
      }

      .therapy-plate {
        min-height: 300px;
      }

      .accessory-grid {
        grid-template-columns: 1fr;
      }

      .accessory-media,
      .expert-photo {
        height: 260px;
      }

      .contact-form-container {
        padding: 32px 24px;
      }

      .form-row {
        grid-template-columns: 1fr;
        gap: 0;
        margin-bottom: 0;
      }

      footer {
        flex-direction: column;
        align-items: flex-start;
        padding: 32px 22px;
      }

      .social-links {
        padding-left: 0;
        border-left: 0;
      }
    }
  </style>
  <link rel="icon" href="favicon-sam.png" type="image/png" />
</head>

<body>
  <?php include __DIR__ . '/includes/header.php'; ?>


  <main>
    <section class="product-hero">
      <div class="hero-shell">
        <div class="hero-copy">
          <div class="eyebrow">sam&reg; Ultrasound Products</div>
          <h1 class="hero-title">sam&reg; <span>3.0</span></h1>
          <p>
            The next evolution in recovery. Long-duration ultrasound therapy reimagined for everyday wearability,
            comfort, and performance.
          </p>
          <div class="hero-actions">
            <a class="btn-primary" href="#features">Explore sam&reg; 3.0</a>
            <a class="btn-outline" href="#video">Watch Video</a>
          </div>
        </div>
        <div class="product-stage">
          <div class="image-frame">
            <video autoplay muted loop playsinline preload="metadata">
              <source src="assets/videos/sam-sport-mobile.mp4" media="(max-width: 767px)" type="video/mp4" />
              <source src="assets/02-SamSport-2025_SOR-WBA_30s-01A.mp4" type="video/mp4" />
            </video>
          </div>
          <div class="device-tag">
            <strong>3.0</strong>
            <span>next evolution in recovery</span>
          </div>
        </div>
      </div>
    </section>

    <section class="section redesign-intro" id="intro">
      <div class="inner redesigned-panel">
        <div class="intro-badge">The Next Evolution</div>
        <h2 class="intro-heading">
          sam&reg; 3.0 builds on the proven technology of sam&reg; 2.0, delivering the same <span
            class="text-gradient">long-duration ultrasound therapy</span> in a more refined and wearable experience.
        </h2>
        <p class="intro-subheading">
          Thoughtful upgrades like faster charging, longer battery life, silent operation, and adaptive applicators help
          support recovery throughout the day without interrupting your routine.
        </p>
        <div class="intro-footer">
          <div class="intro-line"></div>
          <strong>Designed for movement. Built for recovery.</strong>
          <div class="intro-line"></div>
        </div>
      </div>
    </section>

    <!-- SAM 3.0 VIDEO -->
    <!-- <section class="section" style="padding-top:0; padding-bottom: 80px;">
    <div class="inner">
      <div style="border-radius: 24px; overflow: hidden; box-shadow: 0 24px 70px rgba(0,0,0,0.18); background: var(--ink);">
        <video class="lazy-video" muted loop playsinline preload="none" poster="assets/videos/sam-sport-poster.jpg"
          style="width:100%; display:block; max-height:560px; object-fit:cover;">
          <source data-src="assets/videos/sam-sport-mobile.mp4" media="(max-width: 767px)" type="video/mp4"/>
          <source data-src="assets/02-SamSport-2025_SOR-WBA_30s-01A.mp4" type="video/mp4"/>
        </video>
      </div>
    </div>
  </section> -->

    <section class="section alt" id="features">
      <div class="inner">
        <div class="section-header center">
          <div class="section-tag">Feature Highlights</div>
          <h2 class="section-title">Everyday recovery, refined for comfort and performance.</h2>
        </div>
        <div class="highlight-grid">
          <article class="highlight-card">
            <div class="highlight-icon">01</div>
            <h3>Longer Battery Life</h3>
            <p>Up to 6 hours of continuous therapy designed to keep up with your recovery routine.</p>
          </article>
          <article class="highlight-card">
            <div class="highlight-icon">02</div>
            <h3>Faster Charging</h3>
            <p>Spend less time waiting and more time recovering.</p>
          </article>
          <article class="highlight-card">
            <div class="highlight-icon">03</div>
            <h3>No Buzzing Between Sessions</h3>
            <p>A quieter experience designed for uninterrupted daily wear.</p>
          </article>
          <article class="highlight-card">
            <div class="highlight-icon">04</div>
            <h3>LED Light Indicators</h3>
            <p>Simple visual feedback keeps therapy sessions easy to monitor at a glance.</p>
          </article>
          <article class="highlight-card">
            <div class="highlight-icon">05</div>
            <h3>Auto-Adapting Applicators</h3>
            <p>Flexible applicators designed to support a more comfortable fit across different treatment areas.</p>
          </article>
          <article class="highlight-card">
            <div class="highlight-icon">06</div>
            <h3>Wear It Under Clothing</h3>
            <p>Low-profile design allows for recovery that fits into everyday life.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section dark">
      <div class="inner recovery-panel">
        <div class="recovery-copy">
          <h2>Recovery that moves with you</h2>
          <p>sam&reg; 3.0 is designed for people who demand more from recovery, whether at work, in training, or
            throughout everyday movement.</p>
        </div>
        <div class="audience-grid" aria-label="sam 3.0 recovery audiences">
          <article class="audience-card">
            <b>Performance</b>
            <h3>Athletes</h3>
            <p>Supports recovery routines between training, competition, and high-demand movement.</p>
          </article>
          <article class="audience-card">
            <b>Daily Motion</b>
            <h3>Active lifestyles</h3>
            <p>Designed for people who want therapy that fits around errands, workdays, and movement.</p>
          </article>
          <article class="audience-card">
            <b>Service Ready</b>
            <h3>Military and veterans</h3>
            <p>Built for portable recovery support across demanding schedules and long-term mobility needs.</p>
          </article>
          <article class="audience-card">
            <b>Return to Work</b>
            <h3>Workers compensation recovery</h3>
            <p>Helps support consistent treatment routines while patients move through recovery plans.</p>
          </article>
          <article class="audience-card">
            <b>Mobility</b>
            <h3>Aging and mobility support</h3>
            <p>Comfortable daily wearability for people focused on staying active and independent.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="inner therapy-layout">
        <div class="therapy-visual" aria-hidden="true">
          <div class="therapy-plate">
            <img src="assets/sam-3-close-up-1280.webp" width="1280" height="720" loading="lazy" decoding="async"
              alt="sam&reg; 3.0 close-up" />
          </div>
        </div>
        <div>
          <div class="section-header" style="margin-bottom:32px;">
            <div class="section-tag">Technology</div>
            <h2 class="section-title">Proven long-duration ultrasound therapy</h2>
            <p class="section-desc">sam&reg; 3.0 delivers sustained ultrasound therapy designed to support soft tissue
              recovery and localized treatment delivery in a wearable format.</p>
            <p class="section-desc">Built on the same core technology platform as sam&reg; 2.0, sam&reg; 3.0 introduces
              a more refined recovery experience with upgraded usability and portability.</p>
          </div>
        </div>
      </div>
    </section>



    <section class="cta-section" id="contact">
      <div class="cta-inner">
        <h2>Recovery without interruption</h2>
        <p>Experience the next evolution of wearable recovery technology.</p>
        <div class="cta-btns">
          <a class="btn-primary" href="contact-us.php">Contact Us</a>
          <a class="btn-bordered" href="assets/pdfs/MK-1219-00-sam-3-0-sell-sheet-7.pdf" target="_blank" rel="noopener">Download Spec Sheet</a>
          <a class="btn-bordered"
            href="assets/pdfs/LL-2825-00-Rev-A-sam-X1-Model-551-User-Manual-OM551.pdf"
            target="_blank" rel="noopener">sam&reg; 3.0 Manual</a>
        </div>
        <div class="contact-form-container" id="contact-form">
          <h2>Request Information</h2>
          <p>Fill out the form below and a representative will get back to you shortly.</p>
          <form action="submit-enquiry.php" method="POST" id="samContactForm" data-enquiry-form="true">
            <input type="hidden" name="redirect_to" value="sam-3-0.php">
            <input type="hidden" name="form_source" value="sam-3-0.php">
            <input type="text" name="website" value="" tabindex="-1" autocomplete="off" style="display:none">
            <div class="form-row">
              <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" placeholder="Jane" required>
              </div>
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" placeholder="Doe" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="jane@example.com" required>
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="(555) 123-4567">
              </div>
            </div>
            <div class="form-group">
              <label for="inquiry">Inquiry Type</label>
              <select id="inquiry" name="inquiry">
                <option value="patient">I am a Patient</option>
                <option value="provider">I am a Healthcare Provider</option>
                <option value="provider-search">Find a Provider</option>
                <option value="sales">Sales Inquiry</option>
                <option value="support">Technical Support</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="form-group">
              <label for="message">Your Message</label>
              <textarea id="message" name="message" placeholder="How can we help you today?" required></textarea>
            </div>
            <button type="submit" class="btn-submit" id="contactSubmitBtn">
              Send Message
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="22" y1="2" x2="11" y2="13" />
                <polygon points="22 2 15 22 11 13 2 9 22 2" />
              </svg>
            </button>
          </form>
          <div class="thankyou-overlay" id="thankyouOverlay" role="alert" aria-live="polite">
            <div class="ty-icon-wrap">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
              </svg>
            </div>
            <h3>Thank You!</h3>
            <p class="ty-sub">Your message has been received. We appreciate you reaching out to us.</p>
            <div class="ty-note">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 8v4l3 3" />
              </svg>
              Our team will contact you within 1-2 business days.
            </div>
            <button class="btn-reset" id="resetFormBtn" onclick="resetContactForm()">Send Another Message</button>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/includes/footer.php'; ?>


  <script>
    document.querySelectorAll(".faq-trigger").forEach((trigger) => {
      trigger.addEventListener("click", () => {
        const item = trigger.parentElement;
        const isOpen = item.classList.contains("active");

        document.querySelectorAll(".faq-item").forEach((faq) => {
          faq.classList.remove("active");
          faq.querySelector("span").textContent = "+";
        });

        if (!isOpen) {
          item.classList.add("active");
          trigger.querySelector("span").textContent = "-";
        }
      });
    });

    function resetContactForm() {
      const samContactForm = document.getElementById("samContactForm");
      const thankyouOverlay = document.getElementById("thankyouOverlay");
      if (samContactForm) {
        samContactForm.reset();
        samContactForm.style.display = "block";
      }
      if (thankyouOverlay) {
        thankyouOverlay.classList.remove("visible");
      }
    }
  </script>
  <script src="assets/lazy-video.js" defer></script>
  <script src="assets/header-config.js?v=20260911-1"></script>
</body>

</html>
