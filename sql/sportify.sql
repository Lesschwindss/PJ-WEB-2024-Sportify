CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    user_type ENUM('admin', 'coach', 'client'),
    address_line1 VARCHAR(100),
    address_line2 VARCHAR(100),
    city VARCHAR(50),
    postal_code VARCHAR(20),
    country VARCHAR(50),
    phone_number VARCHAR(20),
    student_card VARCHAR(50)
);

CREATE TABLE coaches (
    coach_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    specialty VARCHAR(100),
    photos_de_profil JSON,
    video_url VARCHAR(255),
    cv_url VARCHAR(255),
    availabilities JSON,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE appointments (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    coach_id INT,
    appointment_date DATETIME,
    address VARCHAR(255),
    document_requested VARCHAR(255),
    digicode VARCHAR(10),
    status ENUM('confirmed', 'cancelled'),
    FOREIGN KEY (client_id) REFERENCES users(user_id),
    FOREIGN KEY (coach_id) REFERENCES coaches(coach_id)
);

CREATE TABLE consultations (
    consultation_id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    coach_id INT,
    consultation_date DATETIME,
    notes TEXT,
    FOREIGN KEY (client_id) REFERENCES users(user_id),
    FOREIGN KEY (coach_id) REFERENCES coaches(coach_id)
);

CREATE TABLE payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    amount DECIMAL(10, 2),
    payment_date DATETIME,
    payment_method ENUM('Visa', 'MasterCard', 'American Express', 'PayPal'),
    card_number VARCHAR(20),
    card_holder_name VARCHAR(100),
    card_expiry_date VARCHAR(10),
    card_security_code VARCHAR(5),
    FOREIGN KEY (client_id) REFERENCES users(user_id)
);
