# GAME CARD

Demo: 

![]( https://github.com/naelob/gamecard/blob/main/gifDemo.gif)


1. CLONE THE REPOSITORY

```
git clone https://github.com/naelob/gamecard.git
```

2. INSTALL XAMPP TO RUN THE PROJECT

Locate the folder "htdocs" and put the project you just cloned inside this folder:


![Capture d’écran 2021-01-17 à 20 53 21](https://user-images.githubusercontent.com/39710677/104855569-cfc25b00-590d-11eb-9c99-60831d36744b.png)

3. UPDATE THIS FILE BY CHANGING THE VALUE OF THE VARIABLE $dBName


![Capture d’écran 2021-01-17 à 20 41 46](https://user-images.githubusercontent.com/39710677/104855591-e8cb0c00-590d-11eb-9097-367550abbb95.png)

The value you will put is the name of the database you need to create in phpmyadmin.

4. CREATION OF THE DATABASE

````
Go to this page : https://localhost:8080/phpmyadmin (replace 8080 with the port you are using)
````
Create then your database and remember the name you give to it.

Then you can set the new value of $dBName with this previous name used for the database in PHPMYADMIN.

You must import the database of the game. You can find it in the repo, it's called "dbgamecard.sql". 
Import it just after the creation of your database in PHPMYADMIN.
It's MANDATORY, otherwise you won't be able to play the game.

5. RUN THE PROJECT

````
1. RUN XAMPP
2. WHEN XAMPP HAS RAN THE RIGHT PORT (let's say 8080)
3. GO TO THIS PAGE: http://localhost:8080/projet/home.php ("projet" is the folder located in "htdocs" => replace "projet" with the name of yours)
