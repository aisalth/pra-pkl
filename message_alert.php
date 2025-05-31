<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '
        <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}
?>

<style>

.message {
    position: sticky;
    top: 0;
    background-color: #f1f1f1; /* Warna abu terang */
    max-width: 100%;
    padding: 10px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 1100;
    border-bottom: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    font-family: sans-serif;
}

.message span {
    font-size: 16px;
    color: #333;
}

.message i {
    cursor: pointer;
    color: red;
    font-size: 18px;
}

.message i:hover {
    color: #000;
}

.message {
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

</style>