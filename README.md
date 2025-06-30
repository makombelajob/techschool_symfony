# Tech-School 🏫

**Tech-School** is my final personal project from my web development training program.  
It is a dynamic website built with PHP, HTML, CSS, JavaScript, and SQL that simulates a modern tech school, including a home page, user registration/login system, activity descriptions, and a contact section.

I poured my heart into this project ❤️, and I'm proud to share it.

---

## 🚀 Features

- 🎬 Home page with:
    - Hero image slider
    - About us cards
    - Activities with SVG icons
    - Partners section
    - Google Maps location
    - Contact form with real-time validation

- 👤 User authentication system:
    - Registration form `register.html.twig`
        - Validation: name, email, password, GDPR checkbox
        - Error messages and field retention
    - Login form `login.html.twig`

- 📄 Separate pages:
    - About us `about.html.twig`
    - Registration `register.html.twig`
    - Login `login.html.twig`

- ✨ Fully responsive layout
- 🔄 PHP includes `header.html.twig`, `footer.html.twig` for modular structure

---

## 📸 Screenshot

![App Screenshot de la page d'accueil](/app/public/images/screenshot.png)

---


---

## 🧰 Technologies Used

- ✅ Symfony (Main Framework)
- ✅ HTML5 & CSS3
- ✅ JavaScript (vanilla)
- ✅ PHP 8.1+
- ✅ SQL (MySQL or MariaDB)
- ✅ Google Maps Embed
- ✅ SVG sprite usage

---

## 🧪 How to Run Locally

1. Clone the repository:
   ```
   $ git clone https://github.com/makombelajob/techschool_symfony.git
   ```
2. Install project
    - To get access in main folder. Run the following command
        ```
        $ cd techschool_symfony/app
        ```
    - Make the compose install to rebuild vendor et var. Run the following command
        ```
        $ docker compose install
        ```
    - making datat ready for all display
        ```
        $ composer require --dev orm-fixtures
        $ composer require --dev doctrine/doctrine-fixtures-bundle
        ```
    - Then go back in main folder and run
        ```
        $ cd ..
        $ docker compose up
        ```
    - After you must login in docker system to run following commands
        ```
        # docker compose exec php /bin/bash
        # symfony console make:migration
        # symfony console doctrine:fixtures:load
        ```

    - You can now Enjoy the free ENT at
        ```
        http://127.0.0.1:8080
        ```
---

## Bugs Resolved

---

