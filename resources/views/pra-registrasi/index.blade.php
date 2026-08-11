<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pra Registrasi - Deswa CoreSystem</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    :root {
        --bg: #050816;
        --panel: rgba(15, 23, 42, .72);
        --panel-strong: rgba(15, 23, 42, .92);
        --input: rgba(2, 6, 23, .62);
        --border: rgba(255, 255, 255, .09);
        --border-2: rgba(129, 140, 248, .26);
        --text: #f8fafc;
        --muted: #94a3b8;
        --muted-2: #64748b;
        --indigo: #6366f1;
        --indigo-dark: #4f46e5;
        --cyan: #06b6d4;
        --radius: 18px;
    }

    * {
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        margin: 0;
        padding: 34px;
        min-height: 100vh;
        font-family: 'Inter', sans-serif;
        color: var(--text);
        background:
            radial-gradient(circle at 12% 15%, rgba(79, 70, 229, .26), transparent 28%),
            radial-gradient(circle at 90% 82%, rgba(6, 182, 212, .16), transparent 28%),
            var(--bg);
        overflow-x: hidden;
    }

    body::before {
        content: '';
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 0;
        background-image: linear-gradient(rgba(255, 255, 255, .025) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, .025) 1px, transparent 1px);
        background-size: 50px 50px;
        mask-image: linear-gradient(to bottom, black 0%, rgba(0, 0, 0, .7) 70%, transparent 100%);
    }

    body::after {
        content: '';
        position: fixed;
        width: 360px;
        height: 360px;
        left: -160px;
        bottom: -150px;
        border-radius: 50%;
        background: rgba(99, 102, 241, .12);
        filter: blur(85px);
        pointer-events: none;
        z-index: 0;
    }

    button,
    input,
    textarea,
    select {
        font: inherit;
    }

    button {
        -webkit-tap-highlight-color: transparent;
    }

    .container {
        max-width: 1480px;
        margin: auto;
        position: relative;
        z-index: 1;
        animation: fadeUp .55s ease both;
    }

    .back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 24px;
        color: #c7d2fe;
        text-decoration: none;
        padding: 9px 12px;
        border-radius: 12px;
        border: 1px solid var(--border);
        background: rgba(15, 23, 42, .5);
        font-size: 12px;
        font-weight: 600;
        transition: .22s ease;
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
    }

    .back:hover {
        color: #fff;
        border-color: rgba(129, 140, 248, .3);
        background: rgba(99, 102, 241, .10);
        transform: translateX(-2px);
        box-shadow: 0 0 22px rgba(99, 102, 241, .08);
    }

    .header-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 22px;
        margin-bottom: 24px;
        padding: 24px 26px;
        border: 1px solid var(--border);
        border-radius: 22px;
        background: linear-gradient(135deg, rgba(15, 23, 42, .78), rgba(8, 13, 30, .62));
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        box-shadow: 0 20px 55px rgba(0, 0, 0, .18), inset 0 1px 0 rgba(255, 255, 255, .035);
        position: relative;
        overflow: hidden;
    }

    .header-row::after {
        content: '';
        position: absolute;
        width: 210px;
        height: 130px;
        right: -60px;
        top: -70px;
        background: rgba(99, 102, 241, .17);
        filter: blur(45px);
        pointer-events: none;
    }

    .header h1 {
        margin: 0 0 8px;
        font-size: clamp(28px, 3vw, 40px);
        letter-spacing: -1.2px;
        line-height: 1.1;
    }

    .header p {
        margin: 0;
        color: var(--muted) !important;
        font-size: 13px;
        line-height: 1.6;
    }

    .btn {
        border: 1px solid transparent;
        border-radius: 13px;
        padding: 11px 17px;
        cursor: pointer;
        font-weight: 700;
        font-size: 12px;
        transition: .23s ease;
    }

    .btn:active,
    .btn-sm:active {
        transform: scale(.97);
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--indigo), var(--indigo-dark));
        color: #fff;
        box-shadow: 0 12px 28px rgba(79, 70, 229, .28);
        position: relative;
        z-index: 1;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 18px 38px rgba(79, 70, 229, .38);
    }

    .btn-secondary {
        background: rgba(255, 255, 255, .045);
        color: #dbeafe;
        border-color: var(--border);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, .07);
        border-color: rgba(148, 163, 184, .22);
    }

    .card {
        background: linear-gradient(180deg, rgba(15, 23, 42, .74), rgba(8, 13, 30, .65));
        border: 1px solid var(--border);
        border-radius: 22px;
        padding: 14px;
        box-shadow: 0 24px 70px rgba(0, 0, 0, .22), inset 0 1px 0 rgba(255, 255, 255, .03);
        overflow-x: auto;
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        animation: fadeUp .6s .08s ease both;
    }

    .card::-webkit-scrollbar,
    .modal::-webkit-scrollbar {
        width: 9px;
        height: 9px;
    }

    .card::-webkit-scrollbar-thumb,
    .modal::-webkit-scrollbar-thumb {
        background: rgba(100, 116, 139, .35);
        border-radius: 99px;
    }

    .card::-webkit-scrollbar-track,
    .modal::-webkit-scrollbar-track {
        background: transparent;
    }

    table {
        width: 100%;
        min-width: 1120px;
        border-collapse: separate;
        border-spacing: 0;
    }

    th,
    td {
        padding: 14px 15px;
        border-bottom: 1px solid rgba(255, 255, 255, .055);
        text-align: left;
        white-space: nowrap;
    }

    th {
        background: rgba(255, 255, 255, .035);
        color: #c7d2fe;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: .07em;
        font-weight: 800;
    }

    thead th:first-child {
        border-radius: 12px 0 0 12px;
    }

    thead th:last-child {
        border-radius: 0 12px 12px 0;
    }

    td {
        color: #dbe4f0;
        font-size: 12px;
    }

    tbody tr {
        transition: .2s ease;
    }

    tbody tr:hover {
        background: rgba(99, 102, 241, .045);
    }

    tbody tr:last-child td {
        border-bottom: 0;
    }

    .loading {
        padding: 42px 28px;
        text-align: center;
        color: var(--muted);
        font-size: 13px;
    }

    #loading::before {
        content: '';
        display: inline-block;
        width: 12px;
        height: 12px;
        margin-right: 9px;
        border: 2px solid rgba(129, 140, 248, .2);
        border-top-color: #818cf8;
        border-radius: 50%;
        vertical-align: -2px;
        animation: spin .8s linear infinite;
    }

    .error {
        color: #fca5a5;
    }

    .badge,
    .sent-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 9px;
        border-radius: 999px;
        font-size: 10px;
        font-weight: 800;
        border: 1px solid transparent;
    }

    .badge::before,
    .sent-badge::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 99px;
        background: currentColor;
        box-shadow: 0 0 8px currentColor;
        opacity: .8;
    }

    .status-0 {
        color: #cbd5e1;
        background: rgba(100, 116, 139, .12);
        border-color: rgba(148, 163, 184, .15);
    }

    .status-1 {
        color: #fbbf24;
        background: rgba(245, 158, 11, .09);
        border-color: rgba(245, 158, 11, .18);
    }

    .status-2 {
        color: #a5b4fc;
        background: rgba(99, 102, 241, .11);
        border-color: rgba(129, 140, 248, .2);
    }

    .status-3 {
        color: #6ee7b7;
        background: rgba(16, 185, 129, .09);
        border-color: rgba(52, 211, 153, .18);
    }

    .sent-no {
        color: #94a3b8;
        background: rgba(100, 116, 139, .08);
        border-color: rgba(148, 163, 184, .12);
    }

    .sent-yes {
        color: #67e8f9;
        background: rgba(6, 182, 212, .08);
        border-color: rgba(34, 211, 238, .17);
    }

    /* MODAL */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(2, 6, 23, .76);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 22px;
        z-index: 999;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .modal-overlay.active {
        display: flex;
        animation: overlayIn .2s ease both;
    }

    .modal {
        width: 100%;
        max-width: 900px;
        max-height: 90vh;
        overflow-y: auto;
        border-radius: 24px;
        padding: 26px;
        background: linear-gradient(180deg, rgba(15, 23, 42, .96), rgba(8, 13, 30, .94));
        border: 1px solid rgba(255, 255, 255, .10);
        box-shadow: 0 34px 100px rgba(0, 0, 0, .55), 0 0 50px rgba(79, 70, 229, .08), inset 0 1px 0 rgba(255, 255, 255, .04);
        animation: modalIn .28s cubic-bezier(.2, .8, .2, 1) both;
    }

    .modal-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 24px;
        padding-bottom: 18px;
        border-bottom: 1px solid var(--border);
    }

    .modal-header h2 {
        margin: 0;
        font-size: 20px;
        letter-spacing: -.5px;
    }

    .modal-header p {
        margin: 6px 0 0 !important;
        color: var(--muted) !important;
        font-size: 12px;
    }

    .close-button {
        border: 1px solid var(--border);
        background: rgba(255, 255, 255, .035);
        color: #cbd5e1;
        width: 38px;
        height: 38px;
        flex: 0 0 38px;
        border-radius: 12px;
        font-size: 22px;
        line-height: 1;
        cursor: pointer;
        transition: .2s ease;
    }

    .close-button:hover {
        color: #fff;
        background: rgba(248, 113, 113, .09);
        border-color: rgba(248, 113, 113, .2);
        transform: rotate(4deg);
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 17px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
        min-width: 0;
    }

    .form-group.full {
        grid-column: 1/-1;
    }

    .form-group label {
        font-size: 11px;
        font-weight: 700;
        color: #cbd5e1;
    }

    .form-control {
        width: 100%;
        min-height: 48px;
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 11px 12px;
        outline: none;
        background: var(--input);
        color: #f8fafc;
        transition: .23s ease;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, .02);
    }

    .form-control::placeholder {
        color: #475569;
    }

    .form-control:focus {
        border-color: var(--indigo);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .11), 0 0 24px rgba(99, 102, 241, .07);
        background: rgba(2, 6, 23, .78);
    }

    select.form-control {
        color-scheme: dark;
    }

    select.form-control option {
        background: #0f172a;
        color: #f8fafc;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
        line-height: 1.55;
    }

    .form-errors,
    .form-success {
        display: none;
        border-radius: 12px;
        padding: 12px 14px;
        margin-bottom: 18px;
        font-size: 12px;
        line-height: 1.6;
        border: 1px solid transparent;
    }

    .form-errors {
        background: rgba(127, 29, 29, .18);
        color: #fca5a5;
        border-color: rgba(248, 113, 113, .20);
    }

    .form-success {
        background: rgba(6, 78, 59, .18);
        color: #6ee7b7;
        border-color: rgba(52, 211, 153, .18);
    }

    .form-errors.active,
    .form-success.active {
        display: block;
        animation: fadeUp .2s ease both;
    }

    .modal-footer {
        margin-top: 24px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 18px;
        border-top: 1px solid var(--border);
    }

    .actions {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .btn-sm {
        padding: 7px 10px;
        border: 1px solid transparent;
        border-radius: 9px;
        cursor: pointer;
        font-size: 9px;
        font-weight: 800;
        letter-spacing: .02em;
        transition: .2s ease;
    }

    .btn-sm:hover {
        transform: translateY(-1px);
    }

    .btn-detail {
        background: rgba(255, 255, 255, .045);
        color: #dbeafe;
        border-color: var(--border);
    }

    .btn-detail:hover {
        background: rgba(255, 255, 255, .075);
    }

    .btn-edit {
        background: rgba(59, 130, 246, .10);
        color: #93c5fd;
        border-color: rgba(96, 165, 250, .18);
    }

    .btn-edit:hover {
        box-shadow: 0 0 18px rgba(59, 130, 246, .10);
    }

    .btn-delete {
        background: rgba(239, 68, 68, .09);
        color: #fca5a5;
        border-color: rgba(248, 113, 113, .18);
    }

    .btn-delete:hover {
        box-shadow: 0 0 18px rgba(239, 68, 68, .10);
    }

    .btn-submit {
        background: rgba(99, 102, 241, .14);
        color: #c7d2fe;
        border-color: rgba(129, 140, 248, .22);
    }

    .btn-submit:hover {
        box-shadow: 0 0 19px rgba(99, 102, 241, .13);
    }

    .btn-approve {
        background: rgba(16, 185, 129, .10);
        color: #6ee7b7;
        border-color: rgba(52, 211, 153, .18);
    }

    .btn-approve:hover {
        box-shadow: 0 0 18px rgba(16, 185, 129, .10);
    }

    .btn-send {
        background: rgba(245, 158, 11, .10);
        color: #fcd34d;
        border-color: rgba(251, 191, 36, .18);
    }

    .btn-send:hover {
        box-shadow: 0 0 18px rgba(245, 158, 11, .10);
    }

    .btn-complete {
        background: rgba(168, 85, 247, .10);
        color: #d8b4fe;
        border-color: rgba(192, 132, 252, .18);
    }

    .btn-complete:hover {
        box-shadow: 0 0 18px rgba(168, 85, 247, .10);
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }

    .detail-item {
        background: rgba(2, 6, 23, .50);
        border: 1px solid var(--border);
        padding: 13px;
        border-radius: 12px;
        color: #e2e8f0;
        min-width: 0;
        word-break: break-word;
    }

    .detail-item strong {
        display: block;
        font-size: 9px;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: var(--muted);
        margin-bottom: 6px;
    }

    .detail-item.full {
        grid-column: 1/-1;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(18px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes overlayIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes modalIn {
        from {
            opacity: 0;
            transform: translateY(18px) scale(.98);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @media (prefers-reduced-motion:reduce) {

        *,
        *::before,
        *::after {
            animation-duration: .01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: .01ms !important
        }
    }

    @media (max-width: 900px) {
        body {
            padding: 24px;
        }

        .header-row {
            padding: 21px;
        }

        .modal {
            max-width: 780px;
        }
    }

    @media (max-width: 700px) {
        body {
            padding: 16px;
        }

        .header-row {
            align-items: stretch;
            flex-direction: column;
            padding: 19px;
        }

        .header-row .btn-primary {
            width: 100%;
        }

        .form-grid,
        .detail-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full,
        .detail-item.full {
            grid-column: auto;
        }

        .modal-overlay {
            padding: 10px;
            align-items: flex-end;
        }

        .modal {
            max-height: 94vh;
            border-radius: 22px 22px 14px 14px;
            padding: 20px;
        }

        .modal-footer {
            position: sticky;
            bottom: -20px;
            background: linear-gradient(to bottom, rgba(8, 13, 30, 0), rgba(8, 13, 30, .98) 22%);
            padding-top: 28px;
            padding-bottom: 2px;
        }
    }

    @media (max-width: 460px) {
        body {
            padding: 12px;
        }

        .back {
            margin-bottom: 15px;
        }

        .header-row {
            border-radius: 18px;
            margin-bottom: 14px;
        }

        .header h1 {
            font-size: 27px;
        }

        .card {
            border-radius: 18px;
            padding: 9px;
        }

        .modal-header h2 {
            font-size: 18px;
        }

        .modal-footer {
            flex-direction: column-reverse;
        }

        .modal-footer .btn {
            width: 100%;
        }
    }


    /* =========================
       TOAST + CLICK FX
    ========================= */
    .toast-container {
        position: fixed;
        right: 22px;
        bottom: 22px;
        z-index: 3000;
        display: flex;
        flex-direction: column;
        gap: 12px;
        width: min(390px, calc(100vw - 32px));
        pointer-events: none;
    }

    .toast {
        position: relative;
        overflow: hidden;
        display: grid;
        grid-template-columns: 38px 1fr auto;
        gap: 12px;
        align-items: center;
        padding: 14px 14px 14px 15px;
        border: 1px solid rgba(255, 255, 255, .11);
        border-radius: 16px;
        background: rgba(8, 15, 32, .88);
        -webkit-backdrop-filter: blur(20px);
        backdrop-filter: blur(20px);
        box-shadow: 0 20px 55px rgba(0, 0, 0, .38), inset 0 1px 0 rgba(255, 255, 255, .05);
        color: #e5e7eb;
        pointer-events: auto;
        animation: toastIn .34s cubic-bezier(.2, .8, .2, 1) both;
    }

    .toast::before {
        content: '';
        position: absolute;
        inset: 0 auto 0 0;
        width: 3px;
        background: linear-gradient(180deg, #818cf8, #4f46e5);
        box-shadow: 0 0 18px rgba(99, 102, 241, .7);
    }

    .toast.success::before {
        background: linear-gradient(180deg, #34d399, #10b981);
        box-shadow: 0 0 18px rgba(16, 185, 129, .55);
    }

    .toast.error::before {
        background: linear-gradient(180deg, #fb7185, #ef4444);
        box-shadow: 0 0 18px rgba(239, 68, 68, .55);
    }

    .toast.warning::before {
        background: linear-gradient(180deg, #fbbf24, #f59e0b);
        box-shadow: 0 0 18px rgba(245, 158, 11, .5);
    }

    .toast-icon {
        width: 38px;
        height: 38px;
        display: grid;
        place-items: center;
        border-radius: 12px;
        background: rgba(99, 102, 241, .12);
        border: 1px solid rgba(129, 140, 248, .16);
        color: #c7d2fe;
        font-weight: 900;
    }

    .toast.success .toast-icon {
        background: rgba(16, 185, 129, .11);
        border-color: rgba(52, 211, 153, .17);
        color: #6ee7b7;
    }

    .toast.error .toast-icon {
        background: rgba(239, 68, 68, .10);
        border-color: rgba(248, 113, 113, .17);
        color: #fca5a5;
    }

    .toast.warning .toast-icon {
        background: rgba(245, 158, 11, .10);
        border-color: rgba(251, 191, 36, .17);
        color: #fcd34d;
    }

    .toast-copy {
        min-width: 0;
    }

    .toast-title {
        font-size: 12px;
        font-weight: 800;
        color: #f8fafc;
        margin-bottom: 3px;
    }

    .toast-message {
        color: #94a3b8;
        font-size: 11px;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .toast-close {
        border: 0;
        background: transparent;
        color: #64748b;
        cursor: pointer;
        font-size: 18px;
        line-height: 1;
        padding: 6px;
        border-radius: 8px;
        transition: .2s ease;
    }

    .toast-close:hover {
        color: #fff;
        background: rgba(255, 255, 255, .06);
    }

    .toast.hide {
        animation: toastOut .24s ease forwards;
    }

    @keyframes toastIn {
        from {
            opacity: 0;
            transform: translate3d(24px, 12px, 0) scale(.96);
        }

        to {
            opacity: 1;
            transform: translate3d(0, 0, 0) scale(1);
        }
    }

    @keyframes toastOut {
        to {
            opacity: 0;
            transform: translate3d(18px, 8px, 0) scale(.97);
        }
    }

    .click-ripple {
        position: fixed;
        z-index: 2500;
        width: 12px;
        height: 12px;
        margin: -6px 0 0 -6px;
        border-radius: 50%;
        pointer-events: none;
        background: radial-gradient(circle, rgba(165, 180, 252, .52) 0%, rgba(99, 102, 241, .20) 36%, rgba(6, 182, 212, .08) 58%, transparent 72%);
        box-shadow: 0 0 36px rgba(99, 102, 241, .28);
        animation: clickRipple .58s ease-out forwards;
    }

    @keyframes clickRipple {
        from {
            opacity: .95;
            transform: scale(1);
        }

        to {
            opacity: 0;
            transform: scale(12);
        }
    }

    .btn,
    .btn-sm,
    .close-button {
        position: relative;
        overflow: hidden;
    }

    .press-flash {
        position: absolute;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .34);
        transform: translate(-50%, -50%) scale(0);
        pointer-events: none;
        animation: buttonRipple .52s ease-out forwards;
    }

    @keyframes buttonRipple {
        to {
            transform: translate(-50%, -50%) scale(18);
            opacity: 0;
        }
    }

    @media (max-width: 640px) {
        .toast-container {
            right: 16px;
            bottom: 16px;
            left: 16px;
            width: auto;
        }
    }



    /* =========================
           THEME TOGGLE + LIGHT MODE
        ========================= */
    .header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        position: relative;
        z-index: 2;
    }

    .theme-button {
        width: 44px;
        height: 44px;
        flex: 0 0 44px;
        display: inline-grid;
        place-items: center;
        border: 1px solid var(--border);
        border-radius: 13px;
        background: rgba(255, 255, 255, .035);
        color: #e0e7ff;
        cursor: pointer;
        transition: transform .22s ease, background .22s ease, border-color .22s ease, box-shadow .22s ease;
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        overflow: hidden;
    }

    .theme-button:hover {
        transform: translateY(-2px);
        border-color: rgba(129, 140, 248, .28);
        background: rgba(99, 102, 241, .10);
        box-shadow: 0 10px 28px rgba(79, 70, 229, .18), 0 0 22px rgba(99, 102, 241, .10);
    }

    .theme-button:active {
        transform: translateY(0) scale(.96);
    }

    .theme-button #themeIcon {
        display: inline-block;
        transition: transform .3s ease;
    }

    .theme-button:active #themeIcon {
        transform: rotate(24deg) scale(.9);
    }

    body.light-mode {
        --bg: #f5f7ff;
        --panel: rgba(255, 255, 255, .78);
        --panel-strong: rgba(255, 255, 255, .95);
        --input: rgba(255, 255, 255, .82);
        --border: rgba(15, 23, 42, .10);
        --border-2: rgba(79, 70, 229, .22);
        --text: #0f172a;
        --muted: #64748b;
        --muted-2: #94a3b8;
        background:
            radial-gradient(circle at 12% 15%, rgba(99, 102, 241, .15), transparent 28%),
            radial-gradient(circle at 90% 82%, rgba(6, 182, 212, .10), transparent 28%),
            var(--bg);
        color: var(--text);
    }

    body.light-mode::before {
        background-image:
            linear-gradient(rgba(15, 23, 42, .04) 1px, transparent 1px),
            linear-gradient(90deg, rgba(15, 23, 42, .04) 1px, transparent 1px);
    }

    body.light-mode::after {
        background: rgba(99, 102, 241, .08);
    }

    body.light-mode .back {
        color: #4338ca;
        background: rgba(255, 255, 255, .70);
        box-shadow: 0 10px 26px rgba(15, 23, 42, .06);
    }

    body.light-mode .back:hover {
        color: #312e81;
        background: rgba(255, 255, 255, .94);
    }

    body.light-mode .header-row {
        background: linear-gradient(135deg, rgba(255, 255, 255, .86), rgba(248, 250, 252, .76));
        box-shadow: 0 20px 55px rgba(15, 23, 42, .08), inset 0 1px 0 rgba(255, 255, 255, .95);
    }

    body.light-mode .header-row::after {
        background: rgba(99, 102, 241, .10);
    }

    body.light-mode .header h1 {
        color: #0f172a;
    }

    body.light-mode .theme-button {
        color: #4f46e5;
        background: rgba(255, 255, 255, .76);
        box-shadow: 0 8px 22px rgba(15, 23, 42, .06);
    }

    body.light-mode .btn-secondary {
        color: #334155;
        background: rgba(255, 255, 255, .72);
    }

    body.light-mode .card {
        background: linear-gradient(180deg, rgba(255, 255, 255, .84), rgba(248, 250, 252, .74));
        box-shadow: 0 24px 70px rgba(15, 23, 42, .08), inset 0 1px 0 rgba(255, 255, 255, .95);
    }

    body.light-mode th {
        background: rgba(79, 70, 229, .055);
        color: #4338ca;
    }

    body.light-mode th,
    body.light-mode td {
        border-bottom-color: rgba(15, 23, 42, .065);
    }

    body.light-mode td {
        color: #334155;
    }

    body.light-mode tbody tr:hover {
        background: rgba(99, 102, 241, .05);
    }

    body.light-mode .loading {
        color: #64748b;
    }

    body.light-mode .status-0 {
        color: #475569;
        background: rgba(100, 116, 139, .09);
        border-color: rgba(71, 85, 105, .14);
    }

    body.light-mode .sent-no {
        color: #64748b;
        background: rgba(100, 116, 139, .07);
        border-color: rgba(71, 85, 105, .11);
    }

    body.light-mode .modal-overlay {
        background: rgba(15, 23, 42, .46);
    }

    body.light-mode .modal {
        background: linear-gradient(180deg, rgba(255, 255, 255, .97), rgba(248, 250, 252, .95));
        border-color: rgba(15, 23, 42, .10);
        box-shadow: 0 34px 100px rgba(15, 23, 42, .20), 0 0 50px rgba(79, 70, 229, .07), inset 0 1px 0 rgba(255, 255, 255, .95);
    }

    body.light-mode .modal-header h2 {
        color: #0f172a;
    }

    body.light-mode .close-button {
        color: #475569;
        background: rgba(255, 255, 255, .76);
    }

    body.light-mode .close-button:hover {
        color: #b91c1c;
        background: rgba(254, 226, 226, .72);
    }

    body.light-mode .form-group label {
        color: #334155;
    }

    body.light-mode .form-control {
        background: rgba(255, 255, 255, .88);
        color: #0f172a;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, .9);
    }

    body.light-mode .form-control::placeholder {
        color: #94a3b8;
    }

    body.light-mode .form-control:focus {
        background: #fff;
    }

    body.light-mode select.form-control {
        color-scheme: light;
    }

    body.light-mode select.form-control option {
        background: #fff;
        color: #0f172a;
    }

    body.light-mode .detail-item {
        background: rgba(248, 250, 252, .84);
        border-color: rgba(15, 23, 42, .08);
    }

    body.light-mode .detail-item strong {
        color: #64748b;
    }

    body.light-mode .detail-item span {
        color: #0f172a;
    }

    body.light-mode .toast {
        background: rgba(255, 255, 255, .92);
        border-color: rgba(15, 23, 42, .10);
        box-shadow: 0 20px 55px rgba(15, 23, 42, .14), inset 0 1px 0 rgba(255, 255, 255, .95);
        color: #0f172a;
    }

    body.light-mode .toast-title {
        color: #0f172a;
    }

    body.light-mode .toast-message {
        color: #64748b;
    }

    body.light-mode .toast-close {
        color: #64748b;
    }

    body.light-mode .toast-close:hover {
        color: #0f172a;
        background: rgba(15, 23, 42, .05);
    }

    @media (max-width: 640px) {
        .header-actions {
            width: 100%;
        }

        .header-actions .btn-primary {
            flex: 1;
        }
    }
    </style>
</head>

<body>

    <div class="container">

        <a href="{{ route('dashboard') }}" class="back">
            ← Kembali ke Dashboard
        </a>

        <div class="header-row">

            <div class="header">
                <h1>Pra Registrasi</h1>
                <p>Data investigasi Deswa CoreSystem</p>
            </div>

            <div class="header-actions">
                <button type="button" class="theme-button" id="themeToggle" aria-label="Ganti mode tampilan"
                    title="Ganti mode tampilan">
                    <span id="themeIcon">☾</span>
                </button>

                <button type="button" class="btn btn-primary" id="openCreateModal">
                    + Tambah Data
                </button>
            </div>

        </div>

        <div class="card">

            <div id="loading" class="loading">
                Mengambil data...
            </div>

            <div id="error" class="loading error" style="display:none;"></div>

            <table id="table" style="display:none;">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>No Case</th>
                        <th>Number Case</th>
                        <th>Tanggal Registrasi</th>
                        <th>No Polis</th>
                        <th>Tertanggung</th>
                        <th>Status</th>
                        <th>Kirim Client</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="table-body"></tbody>

            </table>

        </div>

    </div>


    <!-- =========================
     CREATE MODAL
========================= -->

    <div class="modal-overlay" id="createModal">

        <div class="modal">

            <div class="modal-header">

                <div>
                    <h2>Tambah Pra Registrasi</h2>
                    <p style="margin:5px 0 0;color:#71717a;">
                        Masukkan data baru.
                    </p>
                </div>

                <button type="button" class="close-button" id="closeCreateModal">
                    ×
                </button>

            </div>


            <div id="formErrors" class="form-errors"></div>

            <div id="formSuccess" class="form-success">
                Data berhasil ditambahkan.
            </div>


            <form id="createForm">

                <div class="form-grid">

                    <div class="form-group">
                        <label>No Case</label>

                        <input type="text" name="no_case" class="form-control" placeholder="Contoh: CASE-001">
                    </div>


                    <div class="form-group">
                        <label>Number Case</label>

                        <input type="number" name="number_case" class="form-control" placeholder="Contoh: 1">
                    </div>


                    <div class="form-group">
                        <label>Tanggal Registrasi</label>

                        <input type="date" name="tgl_registrasi" class="form-control">
                    </div>


                    <div class="form-group">
                        <label>No Polis</label>

                        <input type="text" name="no_polis" class="form-control" placeholder="Nomor polis">
                    </div>


                    <div class="form-group">
                        <label>Nama Tertanggung</label>

                        <input type="text" name="nm_tertanggung" class="form-control" placeholder="Nama tertanggung">
                    </div>


                    <div class="form-group">
                        <label>Nama Pemegang Polis</label>

                        <input type="text" name="nm_pemegang_polis" class="form-control"
                            placeholder="Nama pemegang polis">
                    </div>


                    <div class="form-group">
                        <label>Nama Agen</label>

                        <input type="text" name="nm_agen" class="form-control" placeholder="Nama agen">
                    </div>


                    <div class="form-group">
                        <label>Asuransi</label>
                        <select name="asuransi_id" id="create_asuransi_id" class="form-control">
                            <option value="">Pilih Asuransi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Klaim</label>
                        <select name="jenisclaim_id" id="create_jenisclaim_id" class="form-control">
                            <option value="">Pilih Jenis Klaim</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Investigator</label>
                        <select name="investigator_id" id="create_investigator_id" class="form-control">
                            <option value="">Pilih Investigator</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Mata Uang</label>
                        <select name="matauang" id="create_matauang" class="form-control">
                            <option value="">Pilih Mata Uang</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Uang Pertanggungan</label>

                        <input type="number" name="uang_pertanggungan" class="form-control" placeholder="0">
                    </div>


                    <div class="form-group">
                        <label>Premi</label>

                        <input type="number" name="premi" class="form-control" placeholder="0">
                    </div>


                    <div class="form-group">
                        <label>Total Premi</label>

                        <input type="number" name="total_premi" class="form-control" placeholder="0">
                    </div>


                    <div class="form-group">
                        <label>Jumlah Klaim</label>

                        <input type="number" name="jml_klaim" class="form-control" placeholder="0">
                    </div>


                    <div class="form-group">
                        <label>Pekerjaan</label>

                        <input type="text" name="pekerjaan" class="form-control">
                    </div>


                    <div class="form-group">
                        <label>Pengaju Klaim</label>

                        <input type="text" name="pengaju_klaim" class="form-control">
                    </div>


                    <div class="form-group full">
                        <label>Alamat Tertanggung</label>

                        <textarea name="alamat_tertanggung" class="form-control"></textarea>
                    </div>


                    <div class="form-group full">
                        <label>Informasi Lain</label>

                        <textarea name="informasi_lain" class="form-control"></textarea>
                    </div>


                    <div class="form-group full">
                        <label>Kronologi Singkat</label>

                        <textarea name="kronologi_singkat" class="form-control"></textarea>
                    </div>

                </div>


                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" id="cancelCreate">
                        Batal
                    </button>

                    <button type="submit" class="btn btn-primary" id="submitCreate">
                        Simpan Data
                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- DETAIL MODAL -->
    <div class="modal-overlay" id="detailModal">
        <div class="modal">
            <div class="modal-header">
                <div>
                    <h2>Detail Pra Registrasi</h2>
                    <p style="margin:5px 0 0;color:#71717a;">Informasi data terpilih.</p>
                </div>
                <button type="button" class="close-button" id="closeDetailModal">×</button>
            </div>
            <div class="detail-grid" id="detailContent"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeDetailButton">Tutup</button>
            </div>
        </div>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal-overlay" id="editModal">
        <div class="modal">
            <div class="modal-header">
                <div>
                    <h2>Edit Pra Registrasi</h2>
                    <p style="margin:5px 0 0;color:#71717a;">Hanya data Draft yang dapat diedit.</p>
                </div>
                <button type="button" class="close-button" id="closeEditModal">×</button>
            </div>

            <div id="editErrors" class="form-errors"></div>

            <form id="editForm">
                <input type="hidden" id="editId">
                <div class="form-grid">
                    <div class="form-group"><label>No Case</label><input type="text" name="no_case" id="edit_no_case"
                            class="form-control"></div>
                    <div class="form-group"><label>Number Case</label><input type="number" name="number_case"
                            id="edit_number_case" class="form-control"></div>
                    <div class="form-group"><label>Tanggal Registrasi</label><input type="date" name="tgl_registrasi"
                            id="edit_tgl_registrasi" class="form-control"></div>
                    <div class="form-group"><label>No Polis</label><input type="text" name="no_polis" id="edit_no_polis"
                            class="form-control"></div>
                    <div class="form-group"><label>Nama Tertanggung</label><input type="text" name="nm_tertanggung"
                            id="edit_nm_tertanggung" class="form-control"></div>
                    <div class="form-group"><label>Nama Pemegang Polis</label><input type="text"
                            name="nm_pemegang_polis" id="edit_nm_pemegang_polis" class="form-control"></div>
                    <div class="form-group"><label>Nama Agen</label><input type="text" name="nm_agen" id="edit_nm_agen"
                            class="form-control"></div>
                    <div class="form-group">
                        <label>Asuransi</label>
                        <select name="asuransi_id" id="edit_asuransi_id" class="form-control">
                            <option value="">Pilih Asuransi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Klaim</label>
                        <select name="jenisclaim_id" id="edit_jenisclaim_id" class="form-control">
                            <option value="">Pilih Jenis Klaim</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Investigator</label>
                        <select name="investigator_id" id="edit_investigator_id" class="form-control">
                            <option value="">Pilih Investigator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mata Uang</label>
                        <select name="matauang" id="edit_matauang" class="form-control">
                            <option value="">Pilih Mata Uang</option>
                        </select>
                    </div>
                    <div class="form-group full"><label>Alamat Tertanggung</label><textarea name="alamat_tertanggung"
                            id="edit_alamat_tertanggung" class="form-control"></textarea></div>
                    <div class="form-group full"><label>Informasi Lain</label><textarea name="informasi_lain"
                            id="edit_informasi_lain" class="form-control"></textarea></div>
                    <div class="form-group full"><label>Kronologi Singkat</label><textarea name="kronologi_singkat"
                            id="edit_kronologi_singkat" class="form-control"></textarea></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelEdit">Batal</button>
                    <button type="submit" class="btn btn-primary" id="submitEdit">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="toast-container" id="toastContainer" aria-live="polite" aria-atomic="true"></div>

    <script>
    function showToast(message, type = 'success', title = null) {
        const container = document.getElementById('toastContainer');
        if (!container) return;

        const labels = {
            success: ['Berhasil', '✓'],
            error: ['Terjadi Kesalahan', '!'],
            warning: ['Perhatian', '•'],
            info: ['Informasi', 'i']
        };

        const [defaultTitle, icon] = labels[type] ?? labels.info;
        const toast = document.createElement('div');
        toast.className = `toast ${type}`;
        toast.innerHTML = `
            <div class="toast-icon">${icon}</div>
            <div class="toast-copy">
                <div class="toast-title">${escapeHtml(title ?? defaultTitle)}</div>
                <div class="toast-message">${escapeHtml(message)}</div>
            </div>
            <button type="button" class="toast-close" aria-label="Tutup notifikasi">×</button>
        `;

        const removeToast = () => {
            if (!toast.isConnected) return;
            toast.classList.add('hide');
            setTimeout(() => toast.remove(), 240);
        };

        toast.querySelector('.toast-close').addEventListener('click', removeToast);
        container.appendChild(toast);
        setTimeout(removeToast, 3600);
    }

    function spawnClickEffect(event) {
        const ripple = document.createElement('span');
        ripple.className = 'click-ripple';
        ripple.style.left = `${event.clientX}px`;
        ripple.style.top = `${event.clientY}px`;
        document.body.appendChild(ripple);
        ripple.addEventListener('animationend', () => ripple.remove(), {
            once: true
        });
    }

    function spawnButtonEffect(button, event) {
        const rect = button.getBoundingClientRect();
        const flash = document.createElement('span');
        flash.className = 'press-flash';
        flash.style.left = `${event.clientX - rect.left}px`;
        flash.style.top = `${event.clientY - rect.top}px`;
        button.appendChild(flash);
        flash.addEventListener('animationend', () => flash.remove(), {
            once: true
        });
    }

    document.addEventListener('click', event => {
        spawnClickEffect(event);
        const button = event.target.closest('.btn, .btn-sm, .close-button');
        if (button) spawnButtonEffect(button, event);
    });


    // ==========================
    // DARK / LIGHT THEME
    // Sinkron dengan Dashboard
    // ==========================
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const savedTheme = localStorage.getItem('deswa-dashboard-theme');

    function applyTheme(theme) {
        const isLight = theme === 'light';
        document.body.classList.toggle('light-mode', isLight);
        themeIcon.textContent = isLight ? '☀' : '☾';
        themeToggle.setAttribute('aria-label', isLight ? 'Aktifkan mode gelap' : 'Aktifkan mode terang');
        themeToggle.setAttribute('title', isLight ? 'Mode Gelap' : 'Mode Terang');
    }

    applyTheme(savedTheme === 'light' ? 'light' : 'dark');

    themeToggle.addEventListener('click', function() {
        const nextTheme = document.body.classList.contains('light-mode') ? 'dark' : 'light';
        localStorage.setItem('deswa-dashboard-theme', nextTheme);
        applyTheme(nextTheme);
        showToast(nextTheme === 'light' ? 'Mode terang diaktifkan.' : 'Mode gelap diaktifkan.', 'info',
            'Tampilan');
    });

    const DATA_URL = "{{ route('pra-registrasi.data') }}";
    const STORE_URL = "{{ route('pra-registrasi.store') }}";
    const SHOW_URL_TEMPLATE = "{{ route('pra-registrasi.show', ['investigasi' => '__ID__']) }}";
    const UPDATE_URL_TEMPLATE = "{{ route('pra-registrasi.update', ['investigasi' => '__ID__']) }}";
    const DELETE_URL_TEMPLATE = "{{ route('pra-registrasi.destroy', ['investigasi' => '__ID__']) }}";
    const SUBMIT_URL_TEMPLATE = "{{ route('pra-registrasi.submit', ['investigasi' => '__ID__']) }}";
    const APPROVE_URL_TEMPLATE = "{{ route('pra-registrasi.approve', ['investigasi' => '__ID__']) }}";
    const SEND_CLIENT_URL_TEMPLATE = "{{ route('pra-registrasi.send-client', ['investigasi' => '__ID__']) }}";
    const COMPLETE_URL_TEMPLATE = "{{ route('pra-registrasi.complete', ['investigasi' => '__ID__']) }}";
    const REFERENCES_URL = "{{ route('references.index') }}";

    const CSRF_TOKEN = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content');


    /* =========================
       REFERENCES
    ========================= */

    let referenceData = {
        asuransis: [],
        jenis_claims: [],
        investigators: [],
        matauangs: []
    };

    async function loadReferences() {
        try {
            const response = await fetch(REFERENCES_URL, {
                headers: {
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (!response.ok || !result.success) {
                throw new Error(result.message ?? 'Gagal mengambil data referensi.');
            }

            referenceData = result.data ?? referenceData;
            fillReferenceSelects();

        } catch (error) {
            console.error('Reference error:', error);
            showToast('Data referensi gagal dimuat: ' + error.message, 'error');
        }
    }

    function setSelectOptions(id, placeholder, items, valueKey, labelBuilder) {
        const select = document.getElementById(id);
        if (!select) return;

        const currentValue = select.value;

        select.innerHTML =
            `<option value="">${escapeHtml(placeholder)}</option>` +
            items.map(item =>
                `<option value="${escapeHtml(item[valueKey])}">${escapeHtml(labelBuilder(item))}</option>`
            ).join('');

        if (currentValue !== '') {
            select.value = currentValue;
        }
    }

    function fillReferenceSelects() {
        ['create_asuransi_id', 'edit_asuransi_id'].forEach(id => {
            setSelectOptions(
                id,
                'Pilih Asuransi',
                referenceData.asuransis ?? [],
                'id',
                item => item.kd_perusahaan ?
                `${item.kd_perusahaan} - ${item.nm_perusahaan}` :
                item.nm_perusahaan
            );
        });

        ['create_jenisclaim_id', 'edit_jenisclaim_id'].forEach(id => {
            setSelectOptions(
                id,
                'Pilih Jenis Klaim',
                referenceData.jenis_claims ?? [],
                'id',
                item => item.keterangan ?
                `${item.jenis_klaim} - ${item.keterangan}` :
                item.jenis_klaim
            );
        });

        ['create_investigator_id', 'edit_investigator_id'].forEach(id => {
            setSelectOptions(
                id,
                'Pilih Investigator',
                referenceData.investigators ?? [],
                'id',
                item => item.telp ?
                `${item.nm_investigator} - ${item.telp}` :
                item.nm_investigator
            );
        });

        ['create_matauang', 'edit_matauang'].forEach(id => {
            setSelectOptions(
                id,
                'Pilih Mata Uang',
                referenceData.matauangs ?? [],
                'matauang',
                item => item.matauang
            );
        });
    }

    /* =========================
       STATUS
    ========================= */

    function statusLabel(status) {

        switch (Number(status)) {

            case 0:
                return 'Draft';

            case 1:
                return 'Diajukan';

            case 2:
                return 'Disetujui';

            case 3:
                return 'Selesai';

            default:
                return '-';
        }
    }


    /* =========================
       LOAD DATA
    ========================= */

    async function loadData() {

        const loading =
            document.getElementById('loading');

        const error =
            document.getElementById('error');

        const table =
            document.getElementById('table');

        const tbody =
            document.getElementById('table-body');


        loading.style.display = 'block';
        error.style.display = 'none';
        table.style.display = 'none';


        try {

            const response = await fetch(DATA_URL, {

                method: 'GET',

                headers: {
                    'Accept': 'application/json'
                }

            });


            if (!response.ok) {

                throw new Error(
                    'HTTP Error: ' + response.status
                );

            }


            const result =
                await response.json();


            tbody.innerHTML = '';


            if (
                !result.data ||
                result.data.length === 0
            ) {

                tbody.innerHTML = `

                <tr>

                    <td
                        colspan="9"
                        style="
                            text-align:center;
                            padding:30px;
                        "
                    >
                        Belum ada data Pra Registrasi.
                    </td>

                </tr>

            `;

            } else {

                result.data.forEach(item => {

                    const row =
                        document.createElement('tr');


                    row.innerHTML = `

                    <td>
                        ${item.id ?? '-'}
                    </td>

                    <td>
                        ${escapeHtml(item.no_case ?? '-')}
                    </td>

                    <td>
                        ${item.number_case ?? '-'}
                    </td>

                    <td>
                        ${item.tgl_registrasi ?? '-'}
                    </td>

                    <td>
                        ${escapeHtml(item.no_polis ?? '-')}
                    </td>

                    <td>
                        ${escapeHtml(item.nm_tertanggung ?? '-')}
                    </td>

                    <td>

                        <span class="badge status-${Number(item.status)}">

                            ${statusLabel(item.status)}

                        </span>

                    </td>

                    <td>

                        <span class="sent-badge ${Number(item.status_sent_client) === 1 ? 'sent-yes' : 'sent-no'}">
                            ${
                                Number(
                                    item.status_sent_client
                                ) === 1

                                    ? 'Sudah dikirim'

                                    : 'Belum dikirim'
                            }
                        </span>

                    </td>

                    <td>
                        <div class="actions">
                            <button class="btn-sm btn-detail" onclick="showDetail(${item.id})">Detail</button>
                            ${
                                Number(item.status) === 0
                                    ? `
                                        <button class="btn-sm btn-edit" onclick="openEdit(${item.id})">Edit</button>
                                        <button class="btn-sm btn-delete" onclick="deleteData(${item.id})">Hapus</button>
                                        <button class="btn-sm btn-submit" onclick="submitData(${item.id})">Ajukan</button>
                                    `
                                    : Number(item.status) === 1
                                        ? `
                                            <button class="btn-sm btn-approve" onclick="approveData(${item.id})">Approve</button>
                                        `
                                        : Number(item.status) === 2 && Number(item.status_sent_client) === 0
                                            ? `
                                                <button class="btn-sm btn-send" onclick="sendClientData(${item.id})">Kirim Client</button>
                                            `
                                            : Number(item.status) === 2 && Number(item.status_sent_client) === 1
                                                ? `
                                                    <button class="btn-sm btn-complete" onclick="completeData(${item.id})">Selesaikan</button>
                                                `
                                                : ''
                            }
                        </div>
                    </td>

                `;


                    tbody.appendChild(row);

                });

            }


            loading.style.display = 'none';

            table.style.display = 'table';


        } catch (err) {

            console.error(err);


            loading.style.display = 'none';

            error.style.display = 'block';


            error.textContent =
                'Gagal mengambil data dari backend: ' +
                err.message;

        }

    }


    /* =========================
       CREATE MODAL
    ========================= */

    const createModal =
        document.getElementById('createModal');

    const createForm =
        document.getElementById('createForm');

    const openCreateModal =
        document.getElementById('openCreateModal');

    const closeCreateModal =
        document.getElementById('closeCreateModal');

    const cancelCreate =
        document.getElementById('cancelCreate');


    function openModal() {

        createModal.classList.add('active');

        document.body.style.overflow = 'hidden';

    }


    function closeModal() {

        createModal.classList.remove('active');

        document.body.style.overflow = '';

    }


    openCreateModal.addEventListener(
        'click',
        openModal
    );


    closeCreateModal.addEventListener(
        'click',
        closeModal
    );


    cancelCreate.addEventListener(
        'click',
        closeModal
    );


    createModal.addEventListener(
        'click',
        function(event) {

            if (event.target === createModal) {

                closeModal();

            }

        }
    );


    /* =========================
       CREATE DATA
    ========================= */

    createForm.addEventListener(
        'submit',
        async function(event) {

            event.preventDefault();


            const submitButton =
                document.getElementById(
                    'submitCreate'
                );

            const formErrors =
                document.getElementById(
                    'formErrors'
                );

            const formSuccess =
                document.getElementById(
                    'formSuccess'
                );


            formErrors.classList.remove('active');

            formSuccess.classList.remove('active');


            const formData =
                new FormData(createForm);


            const payload = {};


            formData.forEach(
                (value, key) => {

                    if (value !== '') {

                        payload[key] = value;

                    }

                }
            );


            submitButton.disabled = true;

            submitButton.textContent =
                'Menyimpan...';


            try {

                const response =
                    await fetch(STORE_URL, {

                        method: 'POST',

                        headers: {

                            'Content-Type': 'application/json',

                            'Accept': 'application/json',

                            'X-CSRF-TOKEN': CSRF_TOKEN

                        },

                        body: JSON.stringify(payload)

                    });


                const result =
                    await response.json();


                if (!response.ok) {

                    if (result.errors) {

                        const messages =
                            Object.values(
                                result.errors
                            )
                            .flat();


                        formErrors.innerHTML =
                            messages
                            .map(
                                message =>
                                `<div>${escapeHtml(message)}</div>`
                            )
                            .join('');


                    } else {

                        formErrors.textContent =
                            result.message ??
                            'Data gagal disimpan.';

                    }


                    formErrors.classList.add(
                        'active'
                    );


                    return;

                }


                showToast(
                    result.message ??
                    'Data berhasil disimpan.',
                    'success'
                );


                createForm.reset();


                await loadData();


                setTimeout(
                    () => {

                        closeModal();


                    },
                    800
                );


            } catch (error) {

                console.error(error);


                formErrors.textContent =
                    'Terjadi kesalahan ketika ' +
                    'menghubungi backend.';


                formErrors.classList.add(
                    'active'
                );


            } finally {

                submitButton.disabled =
                    false;


                submitButton.textContent =
                    'Simpan Data';

            }

        }
    );



    /* =========================
       DETAIL / EDIT / DELETE / SUBMIT
    ========================= */

    function routeWithId(template, id) {
        return template.replace('__ID__', id);
    }

    const detailModal = document.getElementById('detailModal');
    const editModal = document.getElementById('editModal');

    function openOverlay(modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeOverlay(modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    document.getElementById('closeDetailModal').addEventListener('click', () => closeOverlay(detailModal));
    document.getElementById('closeDetailButton').addEventListener('click', () => closeOverlay(detailModal));
    document.getElementById('closeEditModal').addEventListener('click', () => closeOverlay(editModal));
    document.getElementById('cancelEdit').addEventListener('click', () => closeOverlay(editModal));

    detailModal.addEventListener('click', event => {
        if (event.target === detailModal) closeOverlay(detailModal);
    });

    editModal.addEventListener('click', event => {
        if (event.target === editModal) closeOverlay(editModal);
    });

    async function fetchDetail(id) {
        const response = await fetch(routeWithId(SHOW_URL_TEMPLATE, id), {
            headers: {
                'Accept': 'application/json'
            }
        });

        const result = await response.json();

        if (!response.ok) {
            throw new Error(result.message ?? 'Gagal mengambil detail data.');
        }

        return result.data;
    }

    async function showDetail(id) {
        try {
            const item = await fetchDetail(id);
            const content = document.getElementById('detailContent');

            const fields = [
                ['ID', item.id],
                ['No Case', item.no_case],
                ['Number Case', item.number_case],
                ['Tanggal Registrasi', item.tgl_registrasi],
                ['No Polis', item.no_polis],
                ['Nama Tertanggung', item.nm_tertanggung],
                ['Pemegang Polis', item.nm_pemegang_polis],
                ['Nama Agen', item.nm_agen],
                ['Mata Uang', item.matauang],
                ['Status', statusLabel(item.status)],
                ['Kirim Client', Number(item.status_sent_client) === 1 ? 'Sudah dikirim' : 'Belum dikirim'],
                ['Alamat Tertanggung', item.alamat_tertanggung],
                ['Informasi Lain', item.informasi_lain],
                ['Kronologi Singkat', item.kronologi_singkat]
            ];

            content.innerHTML = fields.map(([label, value]) => `
                <div class="detail-item ${['Alamat Tertanggung','Informasi Lain','Kronologi Singkat'].includes(label) ? 'full' : ''}">
                    <strong>${escapeHtml(label)}</strong>
                    <span>${escapeHtml(value ?? '-')}</span>
                </div>
            `).join('');

            openOverlay(detailModal);

        } catch (error) {
            showToast(error.message, 'error');
        }
    }

    async function openEdit(id) {
        try {
            const item = await fetchDetail(id);

            if (Number(item.status) !== 0) {
                showToast('Data hanya dapat diedit ketika masih Draft.', 'warning');
                return;
            }

            document.getElementById('editId').value = item.id;
            document.getElementById('edit_no_case').value = item.no_case ?? '';
            document.getElementById('edit_number_case').value = item.number_case ?? '';
            document.getElementById('edit_tgl_registrasi').value = item.tgl_registrasi ?? '';
            document.getElementById('edit_no_polis').value = item.no_polis ?? '';
            document.getElementById('edit_nm_tertanggung').value = item.nm_tertanggung ?? '';
            document.getElementById('edit_nm_pemegang_polis').value = item.nm_pemegang_polis ?? '';
            document.getElementById('edit_nm_agen').value = item.nm_agen ?? '';

            // Pastikan option reference sudah tersedia sebelum memilih nilai data lama.
            fillReferenceSelects();
            document.getElementById('edit_asuransi_id').value = item.asuransi_id ?? '';
            document.getElementById('edit_jenisclaim_id').value = item.jenisclaim_id ?? '';
            document.getElementById('edit_investigator_id').value = item.investigator_id ?? '';
            document.getElementById('edit_matauang').value = item.matauang ?? '';

            document.getElementById('edit_alamat_tertanggung').value = item.alamat_tertanggung ?? '';
            document.getElementById('edit_informasi_lain').value = item.informasi_lain ?? '';
            document.getElementById('edit_kronologi_singkat').value = item.kronologi_singkat ?? '';

            document.getElementById('editErrors').classList.remove('active');
            openOverlay(editModal);

        } catch (error) {
            showToast(error.message, 'error');
        }
    }

    document.getElementById('editForm').addEventListener('submit', async function(event) {
        event.preventDefault();

        const id = document.getElementById('editId').value;
        const button = document.getElementById('submitEdit');
        const errorBox = document.getElementById('editErrors');
        const formData = new FormData(this);
        const payload = {};

        formData.forEach((value, key) => {
            payload[key] = value === '' ? null : value;
        });

        button.disabled = true;
        button.textContent = 'Menyimpan...';
        errorBox.classList.remove('active');

        try {
            const response = await fetch(routeWithId(UPDATE_URL_TEMPLATE, id), {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                body: JSON.stringify(payload)
            });

            const result = await response.json();

            if (!response.ok) {
                if (result.errors) {
                    errorBox.innerHTML = Object.values(result.errors)
                        .flat()
                        .map(message => `<div>${escapeHtml(message)}</div>`)
                        .join('');
                } else {
                    errorBox.textContent = result.message ?? 'Data gagal diperbarui.';
                }

                errorBox.classList.add('active');
                return;
            }

            closeOverlay(editModal);
            await loadData();
            showToast(result.message ?? 'Data berhasil diperbarui.', 'success');

        } catch (error) {
            errorBox.textContent = 'Terjadi kesalahan ketika menghubungi backend.';
            errorBox.classList.add('active');
        } finally {
            button.disabled = false;
            button.textContent = 'Simpan Perubahan';
        }
    });

    async function deleteData(id) {
        if (!confirm('Yakin ingin menghapus data ini?')) return;

        try {
            const response = await fetch(routeWithId(DELETE_URL_TEMPLATE, id), {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN
                }
            });

            const result = await response.json();

            if (!response.ok) {
                showToast(result.message ?? 'Data gagal dihapus.', 'error');
                return;
            }

            await loadData();
            showToast(result.message ?? 'Data berhasil dihapus.', 'success');

        } catch (error) {
            showToast('Terjadi kesalahan ketika menghubungi backend.', 'error');
        }
    }

    async function submitData(id) {
        if (!confirm('Ajukan data ini? Setelah diajukan, data tidak bisa diedit atau dihapus.')) return;

        try {
            const response = await fetch(routeWithId(SUBMIT_URL_TEMPLATE, id), {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN
                }
            });

            const result = await response.json();

            if (!response.ok) {
                showToast(result.message ?? 'Data gagal diajukan.', 'error');
                return;
            }

            await loadData();
            showToast(result.message ?? 'Data berhasil diajukan.', 'success');

        } catch (error) {
            showToast('Terjadi kesalahan ketika menghubungi backend.', 'error');
        }
    }


    async function runWorkflowAction(url, confirmationMessage, fallbackMessage) {
        if (!confirm(confirmationMessage)) return;

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN
                }
            });

            let result = {};
            try {
                result = await response.json();
            } catch (_) {
                result = {};
            }

            if (!response.ok) {
                showToast(result.message ?? `Request gagal (HTTP ${response.status}).`, 'error');
                return;
            }

            await loadData();
            showToast(result.message ?? fallbackMessage, 'success');

        } catch (error) {
            console.error(error);
            showToast('Terjadi kesalahan ketika menghubungi backend.', 'error');
        }
    }

    async function approveData(id) {
        await runWorkflowAction(
            routeWithId(APPROVE_URL_TEMPLATE, id),
            'Approve data Pra Registrasi ini?',
            'Data berhasil disetujui.'
        );
    }

    async function sendClientData(id) {
        await runWorkflowAction(
            routeWithId(SEND_CLIENT_URL_TEMPLATE, id),
            'Kirim data ini ke client?',
            'Data berhasil dikirim ke client.'
        );
    }

    async function completeData(id) {
        await runWorkflowAction(
            routeWithId(COMPLETE_URL_TEMPLATE, id),
            'Tandai investigasi ini sebagai selesai?',
            'Data berhasil diselesaikan.'
        );
    }

    /* =========================
       ESCAPE HTML
    ========================= */

    function escapeHtml(value) {

        const div =
            document.createElement('div');


        div.textContent =
            String(value);


        return div.innerHTML;

    }


    /* =========================
       INITIAL LOAD
    ========================= */

    document.addEventListener('DOMContentLoaded', async () => {
        await Promise.all([
            loadReferences(),
            loadData()
        ]);
    });
    </script>

</body>

</html>