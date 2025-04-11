CREATE TABLE faq (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria VARCHAR(255),
    domanda TEXT,
    risposta TEXT,
    data_creazione DATE
);

INSERT INTO faq (categoria, domanda, risposta, data_creazione) VALUES
('Rete', 'Come configurare il Wi-Fi?', 'Accedi al router e imposta SSID e password WPA2.', CURDATE()),
('Server', 'Come accedere al server da remoto?', 'Usare VPN o accesso con NAT e DNS configurato.', CURDATE());
