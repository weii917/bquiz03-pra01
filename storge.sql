INSERT INTO `poster` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES (NULL, '預告片01', '03A01.jpg', '1', '1', '1');
INSERT INTO `poster` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES (NULL, '預告片02', '03A02.jpg', '1', '2', '2');
INSERT INTO `poster` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES (NULL, '預告片03', '03A03.jpg', '1', '3', '3');
INSERT INTO `poster` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES (NULL, '預告片04', '03A04.jpg', '1', '4', '1');
INSERT INTO `poster` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES (NULL, '預告片05', '03A05.jpg', '1', '5', '2');
INSERT INTO `poster` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES (NULL, '預告片06', '03A06.jpg', '1', '6', '3');
INSERT INTO `poster` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES (NULL, '預告片07', '03A07.jpg', '1', '7', '1');
INSERT INTO `poster` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES (NULL, '預告片08', '03A08.jpg', '1', '8', '2');
INSERT INTO `poster` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES (NULL, '預告片09', '03A09.jpg', '1', '9', '3');
2
3
4
5
6
7
8
9
10
11
12
13

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `tralier`, `poster`, `intro`, `rank`, `sh`) VALUES (NULL, '院線片01', '1', '120', '2024-02-16', '發行商01', '導演01', '03B01v.mp4', '03B01.png', '院線片01簡介', '1', '1');
INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `tralier`, `poster`, `intro`, `rank`, `sh`) VALUES (NULL, '院線片02', '2', '120', '2024-02-17', '發行商02', '導演02', '03B02v.mp4', '03B02.png', '院線片02簡介', '2', '1');
INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `tralier`, `poster`, `intro`, `rank`, `sh`) VALUES (NULL, '院線片03', '3', '120', '2024-02-18', '發行商03', '導演03', '03B03v.mp4', '03B03.png', '院線片03簡介', '3', '1');
INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `tralier`, `poster`, `intro`, `rank`, `sh`) VALUES (NULL, '院線片04', '4', '120', '2024-02-15', '發行商04', '導演04', '03B04v.mp4', '03B04.png', '院線片04簡介', '4', '1');
INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `tralier`, `poster`, `intro`, `rank`, `sh`) VALUES (NULL, '院線片05', '5', '120', '2024-02-16', '發行商05', '導演05', '03B05v.mp4', '03B05.png', '院線片05簡介', '5', '1');
INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `tralier`, `poster`, `intro`, `rank`, `sh`) VALUES (NULL, '院線片06', '6', '120', '2024-02-17', '發行商06', '導演06', '03B06v.mp4', '03B06.png', '院線片06簡介', '6', '1');
INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `tralier`, `poster`, `intro`, `rank`, `sh`) VALUES (NULL, '院線片07', '7', '120', '2024-02-15', '發行商07', '導演07', '03B07v.mp4', '03B07.png', '院線片07簡介', '7', '1');
INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `tralier`, `poster`, `intro`, `rank`, `sh`) VALUES (NULL, '院線片08', '8', '120', '2024-02-16', '發行商08', '導演08', '03B08v.mp4', '03B08.png', '院線片08簡介', '8', '1');
INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `tralier`, `poster`, `intro`, `rank`, `sh`) VALUES (NULL, '院線片09', '9', '120', '2024-02-17', '發行商09', '導演09', '03B09v.mp4', '03B09.png', '院線片09簡介', '9', '1');
INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `tralier`, `poster`, `intro`, `rank`, `sh`) VALUES (NULL, '院線片010', '10', '120', '2024-02-15', '發行商010', '導演010', '03B010v.mp4', '03B010.png', '院線片010簡介', '10', '1');
INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `tralier`, `poster`, `intro`, `rank`, `sh`) VALUES (NULL, '院線片011', '11', '120', '2024-02-16', '發行商011', '導演011', '03B011v.mp4', '03B011.png', '院線片011簡介', '11', '1');
INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `tralier`, `poster`, `intro`, `rank`, `sh`) VALUES (NULL, '院線片012', '12', '120', '2024-02-17', '發行商012', '導演012', '03B012v.mp4', '03B012.png', '院線片012簡介', '12', '1');
INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `tralier`, `poster`, `intro`, `rank`, `sh`) VALUES (NULL, '院線片013', '13', '120', '2024-02-18', '發行商013', '導演013', '03B013v.mp4', '03B013.png', '院線片013簡介', '13', '1');


INSERT INTO `orders` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seats`) VALUES (NULL, '20240217000${$i}', '院線片0{$i}', '2024-02-17', '14:00~16:00', '2', '{$seats}')