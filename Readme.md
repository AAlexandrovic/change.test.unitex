Для подключения к бд нужно в методе /src/config.php прописать настройки доступа к бд (используется mysql)
Затем пройти по адресу http(s)://domain/create/create.php для создания таблицы заявок в бд
backend логика находится в папке api/ApplicationsController.php
frontend шаблоны вывода запросов из backend запросов в папке View
P.S. Всё что не отваливается в css стилях перенёс в отдельный файл, к сожалению всё равно некотрые стили пришлось писать в index.php наверно изза ajax они не прорисовывались или прорисовывались не полностью.  Хотя иногда и работали из файла. От чего это зависело я пока не понял. 