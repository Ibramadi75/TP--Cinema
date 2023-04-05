DROP DATABASE IF EXISTS `cinema`;
CREATE DATABASE `cinema`;
USE `cinema`;

CREATE TABLE `categories`(
    cat VARCHAR(255) NOT NULL,
    libelle VARCHAR(255) NOT NULL,
    PRIMARY KEY (cat)
);

CREATE TABLE `films`(
    id INT AUTO_INCREMENT NOT NULL,
    titre VARCHAR(255) NOT NULL,
    cat VARCHAR(255) NOT NULL,
    duree INT NOT NULL,
    anSortie YEAR NOT NULL,
    img_url VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (cat) REFERENCES categories(cat)
);

INSERT INTO categories(cat, libelle)
    VALUES
    ('C', 'Comédie'),
    ('SF', 'Science Fiction'),
    ('A', 'Aventure');


INSERT INTO films (id, titre, cat, duree , anSortie, img_url)
    VALUES
    (1 , 'La vie scolaire', 'C', 120 , 2020,'https://th.bing.com/th/id/R.77b17d6152a780e37fd8e93f93d8af43?rik=aeGdtsoTMJ0QLw&riu=http%3a%2f%2ffr.web.img4.acsta.net%2fpictures%2f19%2f07%2f02%2f10%2f20%2f5277092.jpg&ehk=7BLTs7%2fFQEfo4QQChtY2TBB7u1uNHc0rhvn0%2fuEwhys%3d&risl=&pid=ImgRaw&r=0'),
    (2 , 'Matrix', 'SF', 120 , 2001,'https://www.google.com/search?q=matrix+1&client=firefox-b-d&source=lnms&tbm=isch&sa=X&ved=2ahUKEwi05or3s43-AhU_UKQEHWyJBXYQ_AUoAXoECAEQAw#imgrc=8sqUpqDCiXJO3M'),
    (3 , 'Suzume', 'a', 122 , 2023,'https://th.bing.com/th/id/OIP.buddBUxnAY-cP1VHN7Nr1gHaKe?pid=ImgDet&rs=1'),
    (4 , 'Pulp Fiction', 'C', 147 , 1994,'https://th.bing.com/th/id/OIP.2RTYokn9ZDCPiIUTr6jX7gHaLH?pid=ImgDet&rs=1'),
    (5 , 'Le Chateau ambulant', 'C', 120 , 2004,'https://www.google.com/search?q=le+chateau+ambulant&client=firefox-b-d&source=lnms&tbm=isch&sa=X&ved=2ahUKEwiHwP2GtI3-AhW0Q6QEHZXmAZoQ_AUoAXoECAEQAw#imgrc=o0dPfS_-uMx6CM'),
    (6 , 'kung Fu Panda', 'C', 90 , 2008,'https://www.google.com/search?q=kung+Fu+Panda&tbm=isch&ved=2ahUKEwiFgr-ItI3-AhWFnCcCHclyCK0Q2-cCegQIABAA&oq=kung+Fu+Panda&gs_lcp=CgNpbWcQAzIKCAAQDRCABBCxAzIKCAAQDRCABBCxAzIKCAAQDRCABBCxAzIKCAAQDRCABBCxAzIHCAAQDRCABDIHCAAQDRCABDIHCAAQDRCABDIHCAAQDRCABDIHCAAQDRCABDIHCAAQDRCABDoKCAAQigUQsQMQQzoFCAAQgARQ9w5Y9w5grBRoAHAAeACAAcABiAG6ApIBAzAuMpgBAKABAaoBC2d3cy13aXotaW1nwAEB&sclient=img&ei=dJ0qZIX4EYW5nsEPyeWh6Ao&client=firefox-b-d#imgrc=UTc1QVOQiCu-zM'),
    (7 , 'Star Wars III', 'SF', 140 , 2005,'https://www.google.com/search?q=star+wars+%C3%A9pisode+iii+la+revanche+des+sith&client=firefox-b-d&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjw3LyktI3-AhWKUqQEHSkuCIAQ_AUoAXoECAEQAw#imgrc=hVaSqO6p-iUCcM');
 

