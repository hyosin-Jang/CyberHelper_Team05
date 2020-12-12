CREATE TABLE events (
id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
title varchar(250) NULL,
event_date timestamp NULL
);

INSERT INTO `events` (`id`, `title`, `event_date`) VALUES
(1, 'OSP-HW', '2020-12-10 11:07:27'),
(2, 'OSP-LC', '2020-12-8 11:07:27'),
(3, 'OSP-Week8-HW', '2020-12-15 11:07:27'),
(4, 'OSP-Firebase', '2020-12-20 11:07:27'),
(5, 'OSP', '2020-12-9 11:07:27');