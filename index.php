<!DOCTYPE html>
<html>

<head>
  <title>Тестовое задание</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,500;1,100;1,200&display=swap');

  body {
    font-family: 'Raleway', sans-serif;
    background-color: #F6F5F5;
  }

  .container {
    max-width: 1400px;
  }

  .time {
    margin-left: 10%;
    margin-top: 50px;
  }

  .button {
    width: 376px;
    height: 60px;
    margin-top: 50px;
    border-radius: 10px;
    gap: 10px;
    background-color: #4C9BE4;
    border: none;
    margin-bottom: 50px;
  }

  button:focus {
    outline: none;
  }

  @media (max-width: 576px) {
    .modal-btn {
      margin-top: 15px;
      margin-bottom: 15px;
      width: 100%;
      height: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      border-radius: 10px;
      background-color: #4C9BE4;
      font-family: Raleway;
      font-size: 14px;
      font-weight: 700;
      line-height: 16px;
      letter-spacing: 0.02em;
      text-align: center;
    }
  }

  @media(min-width: 576px) {
    .modal-btn {
      width: 127px;
      height: 40px;
      border-radius: 10px;
      background-color: #4C9BE4;
      font-family: Raleway;
      font-size: 14px;
      font-weight: 700;
      line-height: 16px;
      letter-spacing: 0.02em;
      text-align: center;
    }
  }

  @media (min-width: 768px) and (max-width:1000px) {

    .block span {
      font-size: 10px;
    }

    .block text {
      font-size: 12px;
    }

    .rectangle p {
      font-size: 10px;
      padding-left: 10px;
    }

    .rectangle text {
      font-size: 12px;
      padding-left: 10px;
    }
  }

  .block {
    max-width: 1, 400px;
    min-height: 108px;
    border-radius: 10px;
    background-color: #FFFFFF;
    margin-bottom: 20px;
  }

  .block:active {
    border: 3px solid #4C9BE4;
  }

  .block:active .rectangle {
    background-color: rgba(76, 155, 228, 1);
  }

  .block:active .sm-rectangle {
    background-color: rgba(76, 155, 228, 1);
  }

  .block:active #firstForm {
    background-color: rgba(76, 155, 228, 1);
  }

  #firstForm {
    background-color: #E1EFFB;
  }

  .block:hover {
    cursor: pointer;
  }
</style>

<body>
  <div class="container">
    <div class="container top">
      <h1 class="text-center title">Заявки на вызов менеджера</h1>
      <!-- Выводим количество заявко через ajax запрос -->
      <div class="row justify-content-center time" id="test">
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <button class="btn btn-primary button" data-toggle="modal" data-target="#myModal"><text>Добавить заявку</text></button>
      </div>
    </div>
    <!-- в этом контейнере выводим заявки -->
    <div class="container" id="result">
    </div>
    <!-- Модальное окно -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header d-flex align-items-center">
            <button type="button" class="close d-md-none" data-dismiss="modal" aria-label="Close"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.420848 0.420873C0.715242 0.126473 1.19255 0.126473 1.48694 0.420873L19.5792 18.5134C19.8736 18.8078 19.8736 19.2852 19.5792 19.5796C19.2848 19.874 18.8075 19.874 18.5131 19.5796L0.420848 1.48699C0.126454 1.19259 0.126454 0.715273 0.420848 0.420873Z" fill="#666666" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5791 0.420873C19.2847 0.126473 18.8074 0.126473 18.513 0.420873L0.420746 18.5134C0.126353 18.8078 0.126353 19.2852 0.420747 19.5796C0.71514 19.874 1.19245 19.874 1.48684 19.5796L19.5791 1.48699C19.8735 1.19259 19.8735 0.715273 19.5791 0.420873Z" fill="#666666" />
              </svg></button>
            <div class="col-md-2 h-image">
              <div class=" d-flex justify-content-center modal-png "><svg padding-top="14" width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.50573 16.7406C8.35493 15.5953 8.26539 14.4407 7.9685 13.3158C7.90488 13.0759 7.82712 12.84 7.77293 12.5977C7.69674 12.2568 7.81299 12.082 8.15386 12.071C8.71623 12.0537 9.27938 12.0522 9.84175 12.071C10.2101 12.0835 10.3554 12.3069 10.2227 12.7059C9.85039 13.8292 9.6721 14.987 9.55507 16.1574C9.53229 16.3847 9.52208 16.6136 9.50401 16.8683C9.71529 16.7939 9.72865 16.6332 9.78441 16.5124C10.3719 15.2441 10.9618 13.9766 11.5304 12.7004C11.6797 12.3657 11.8634 12.2646 12.2295 12.343C15.2031 12.9756 17.334 15.2198 17.8406 18.2856C17.9065 18.6846 17.9584 19.0867 17.9921 19.4888C18.0283 19.9223 17.9513 19.9968 17.5193 19.9984C16.6294 20.0015 15.7395 19.9992 14.8496 19.9992C10.086 19.9992 5.32161 19.9992 0.557985 19.9992C0.0490271 19.9992 -0.0224468 19.9474 0.00504315 19.5273C0.12757 17.6695 0.664018 15.9622 1.90735 14.53C2.96532 13.3111 4.31783 12.5915 5.87848 12.2285C6.18401 12.1572 6.32696 12.2826 6.44634 12.5484C7.0252 13.8347 7.6182 15.1148 8.20727 16.3964C8.26539 16.5234 8.33294 16.6465 8.39577 16.7719C8.4319 16.7617 8.46882 16.7507 8.50495 16.7406H8.50573Z" fill="white" />
                  <path d="M9.00055 9.96548C6.27511 9.96626 3.99187 7.67968 4.00758 4.96275C4.02329 2.25209 6.28925 0 9.00055 0C11.7307 0 14.01 2.28423 13.9927 5.00194C13.9762 7.71731 11.7158 9.96469 9.00055 9.96548Z" fill="white" />
                </svg></div>
            </div>
            <h4 class="modal-title col-md-8" id="myModalLabel" style="padding-top:15px">
              <p>Вызвать менеджера</p>
            </h4>
            <button type="button" class="col-md-2 d-none d-md-block" data-dismiss="modal" style="border: none; background-color: #F7F7F7"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.420848 0.420873C0.715242 0.126473 1.19255 0.126473 1.48694 0.420873L19.5792 18.5134C19.8736 18.8078 19.8736 19.2852 19.5792 19.5796C19.2848 19.874 18.8075 19.874 18.5131 19.5796L0.420848 1.48699C0.126454 1.19259 0.126454 0.715273 0.420848 0.420873Z" fill="#666666" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5791 0.420873C19.2847 0.126473 18.8074 0.126473 18.513 0.420873L0.420746 18.5134C0.126353 18.8078 0.126353 19.2852 0.420747 19.5796C0.71514 19.874 1.19245 19.874 1.48684 19.5796L19.5791 1.48699C19.8735 1.19259 19.8735 0.715273 19.5791 0.420873Z" fill="#666666" />
              </svg></button>
          </div>
          <div class="modal-body">
            <div class="container-fluid justify-content-center">
              <form id="Form">
                <div class="form-group">
                  <label for="name" class="label"><text>Контактное лицо:</text><span class="required-field">*</span></label>
                  <input type="text" class="form-control" id="name" name="name">
                  <span class="error" id="name-error"></span>
                </div>
                <div class="form-group">
                  <label for="number" class="label"><text>Ваш номер телефона:</text><span class="required-field">*</span></label>
                  <input type="tel" class="form-control" id="number" name="number">
                  <span class="error" id="number-error"></span>
                </div>
                <div class="form-group">
                  <label for="mail" class="label"><text>E-mail:</text><span class="required-field">*</span></label>
                  <input type="text" class="form-control" id="mail" name="mail">
                  <span class="error" id="mail-error"></span>
                </div>
                <div class="form-group">
                  <label for="city" class="label"><text>Город:</text><span class="required-field">*</span></label>
                  <input type="text" class="form-control" id="city" name="city">
                  <span class="error" id="city-error"></span>
                </div>
                <div class="row">
                  <div class="col-12">
                    <p class="text-start message">Нажимая кнопку «Отправить заявку» вы подтверждаете свое согласие на обработку персональных данных и ознакомление с <text>условиями политики обработки персональных данных.</text></p>
                  </div>
                </div>
                <div>
                  <input type="hidden" name="create" value="x">
                </div>
                <button type="submit" class="btn btn-primary modal-btn">Отправить</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      //Получаем данные из бд и выводим их на экран
      setInterval(function() {
          $.ajax({
            url: "/Views/application.php",
            type: "GET",
            dataType: "html",
            success: function(data) {
              $("#result").html(data);
            },
            error: function(xhr, status, error) {
              // Обрабатываем ошибки
              console.log('Error: ' + error.message);
            }
          });
        },
        1000); // каждую секунду повторяем запрос

      //тоже самое но для вывода времени
      setInterval(function() {
          $.ajax({
            url: "/Views/time.php",
            type: "GET",
            dataType: "html",
            success: function(data) {
              $("#test").html(data);
            },
            error: function(xhr, status, error) {
              // Обрабатываем ошибки
              console.log('Error: ' + error.message);
            }
          });
        },
        1000); // так-же каждую секунду обновляем запрос

      // Скрипт удаления заявки из бд
      $('#result').on('submit', '#myForm', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
          type: 'POST',
          url: '/api/ApplicationsController.php',
          data: formData,
          success: function(response) {
            console.log(response);
          },
          error: function(xhr, status, error) {
            // Обрабатываем ошибки
            console.log('Error: ' + error.message);
          }
        });
      });

      //Валидация формы
      $('#Form').submit(function(e) {
        e.preventDefault();
        var name = $('#name').val();
        var mail = $('#mail').val();
        var number = $('#number').val();
        var city = $('#city').val();

        //регулярное выражение проверки строки почты
        var reg = /^\w+([\.-]?\w+)*@(((([a-z0-9]{2,})|([a-z0-9][-][a-z0-9]+))[\.][a-z0-9])|([a-z0-9]+[-]?))+[a-z0-9]+\.([a-z]{2}|(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/i;
        var error = false;
        var formData = $(this).serialize(); // получаем данные формы в виде строки
        if (name.length == 0) {
          $('#name').addClass('is-invalid');
          $('#name-error').text('Заполните это поле');
          error = true;
        } else {
          $('#name').removeClass('is-invalid');
          $('#name-error').text('');
        }

        if (mail.length == 0) {
          $('#mail').addClass('is-invalid');
          $('#mail-error').text('Заполните это поле');
          error = true;
        } else if (!reg.test(mail)) { // проводим валидацию строки почты
          $('#mail').addClass('is-invalid');
          $('#mail-error').text('Неверный формат email');
          error = true;
        } else {
          $('#mail').removeClass('is-invalid');
          $('#mail-error').text('');
        }

        if (number.length == 0) {
          $('#number').addClass('is-invalid');
          $('#number-error').text('Заполните это поле');
          error = true;
        } else {
          $('#number').removeClass('is-invalid');
          $('#number-error').text('');
        }

        if (city.length == 0) {
          $('#city').addClass('is-invalid');
          $('#city-error').text('Заполните это поле');
          error = true;
        } else {
          $('#city').removeClass('is-invalid');
          $('#city-error').text('');
        }
        //Отправляем запрос
        if (!error) {
          $.ajax({
            url: '/api/ApplicationsController.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
              console.log(response.error);
              if (response.error) {
                // Если есть сообщение об ошибке, выводим его
                const errorElement = $('<div>').text('Ошибка: ' + response.error);
                $('#Form').append(errorElement);
                //Удаляем добавленный элемент
                setTimeout(function() {
                  errorElement.remove();
                }, 1000);
              } else if (response.success) {
                $('#myModal').modal('hide'); // скрываем модальное окно после успешной отправки формы
              }
            },
            error: function(xhr, status, error) {
              console.log('Ошибка запроса:' + error.message)
            }
          });
        }
      });
      $('#myModal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset(); //очищаем модальное окно если его закроют
        $('.is-invalid').removeClass('is-invalid');
        $('.error').text('');
      });
    });
  </script>
</body>

</html>