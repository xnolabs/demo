INSERT INTO `Product` 
(`prodId`, 
`prodName`, 
`prodPicNameSmall`, 
`prodPicNameLarge`, 
`prodDescripShort`, 
`prodDescripLong`, 
`prodPrice`, 
`prodQuantity`) VALUES 
(NULL, 'Bang & Olufsen BeoSound 2', 'bang-olufsen-small.webp', 'bang-olufsen-large.webp', '<p>Crafted from solid aluminium, the BeoSound 2 combines the signature sound of Bang & Olufsen with the easy voice control of the Google Assistant. It features an intuitive One Touch interface, simple streaming with Chromecast and Airplay 2 built in, and is multiroom ready with other compatible B&O speakers.', 'Crafted from solid aluminium, the BeoSound 2 combines the signature sound of Bang & Olufsen with the easy voice control of the Google Assistant. It features an intuitive One Touch interface, simple streaming with Chromecast and Airplay 2 built in, and is multiroom ready with other compatible B&O speakers.</p>
<br>
<b>Signature B&O sound in 360</b>
<p>Enjoy immersive sound and flawless bass definition. Finely tuned by Bang & Olufsen, the BeoSound 2 delivers the signature sound that the company are renowned for. It features advanced 360-degree sound dispersion for an immersive listening experience. Wherever you’re seated in relation to the speaker, you’ll enjoy perfectly distributed audio.</p>

<b>Google assistant built-in</b>
<p>Interact with the Google Voice Assistant via five integrated microphones. Play music, find answers on Google Search, manage everyday tasks, and easily control compatible smart devices around the home, just by using your voice.</p>

<b>Multiroom music</b>
<p>Built-in multiroom technology lets you connect your BeoSound 2 home speaker with other compatible Bang & Olufsen speakers throughout the home to create one integrated wireless sound system.</p>

<b>Seamless streaming</b>
<p>Effortlessly stream music from a smart phone to BeoSound 2 using any major music streaming service, including Spotify and Deezer*. It has Chromecast built-in as well as Airplay 2, or simply stream from your device over Bluetooth.</p>

<b>One touch interface</b>
<p>The top of the speaker works as a minimalistic control panel. Simply tap to start your favourite radio station, turn the wheel to adjust the volume and swipe to change tracks. And it features preset buttons to instantly access your favourites.</p>

<b>Quality craftsmanship</b>
<p>The BeoSound 2 is constructed from high-grade aluminium. Not only does it assure premium aesthetics, it provides superior acoustic performance and distortion-free sound.</p>', 1650.00, 200);

CREATE TABLE `Users` 
( `userId` INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY , 
	`userType` VARCHAR(50) NOT NULL , 
	`userFName` VARCHAR(50) NOT NULL , 
	`userSName` VARCHAR(50) NOT NULL , 
	`userAddress` VARCHAR(50) NOT NULL , 
	`userPostCode` VARCHAR(50) NOT NULL , 
	`userTelNo` VARCHAR(50) NOT NULL , 
	`userEmail` VARCHAR(50) NOT NULL , 
	`userPassword` VARCHAR(50) NOT NULL ) ENGINE = InnoDB;