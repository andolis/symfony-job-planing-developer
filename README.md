# symfony-job-planing-developer

Dış planlayıcıdan servis edilen task manager durumlarını developer iletilmesi

Kullanılan Teknolojiler;
    - Docker
    - Nginx
    - PHP (Symfony Framework, Doctrine)
    - MariaDB
    - RabbitMQ

Kurulum Adımları;
    - cd PATH/
    - docker-compose up -d
    - docker run exec -t php bin/console doctrine:database:create
    - docker run exec -t php bin/console doctrine:migrations:migrate
    - http://localhost:3001/
    
Console Micro Servis Başlatılması;
    - php bin/console app:create-task-service "http://www.mocky.io/v2/5d47f24c330000623fa3ebfa" "Provider1"
    - php bin/console app:create-task-service "http://www.mocky.io/v2/5d47f235330000623fa3ebf7" "Provider2"