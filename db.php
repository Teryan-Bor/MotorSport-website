<?php

function getDbConnection() {
    // Reads from environment variables when set (Render/production),
    // falls back to local MAMP defaults when not set (local dev).
    $host   = getenv('DB_HOST') ?: 'localhost';
    $port   = getenv('DB_PORT') ?: 3306;
    $user   = getenv('DB_USER') ?: 'root';
    $pass   = getenv('DB_PASSWORD') ?: 'root';
    $dbname = getenv('DB_NAME') ?: 'boris';
    $caPath = getenv('DB_SSL_CA') ?: null; // path to ca.pem, only set in production

    $db = mysqli_init();

    if ($caPath) {
        // Production (Aiven): use SSL
        mysqli_ssl_set($db, null, null, $caPath, null, null);
        mysqli_real_connect(
            $db,
            $host,
            $user,
            $pass,
            $dbname,
            (int)$port,
            null,
            MYSQLI_CLIENT_SSL
        );
    } else {
        // Local dev: plain connection, no SSL
        mysqli_real_connect($db, $host, $user, $pass, $dbname, (int)$port);
    }

    if (mysqli_connect_errno()) {
        die("connection error: " . mysqli_connect_error());
    }

    return $db;
}