Weather Info - zadanie rekrutacyjne PHP
=======================================
Rozwiązanie zadania rekrutacyjnego.

Użyte technologie to głównie PHP (framework CodeIgniter) i Javascript (Jquery, Jquery UI)...
Dostęp do panelu administracyjnego: 
login: admin@admin.com 
password: password
Zrzut z bazy znajduje się w folderze sql.

Treść zadania:
--------------
W ramach tego zadania należy stworzyć aplikację, która korzystając z publicznie dostępnych usług 
sieciowych (używając SOAP) będzie pobierała i wyświetlała w dowolnym miejscu strony informację 
na temat pogody w wybranym przez użytkownika mieście.
Aplikacja powinna składać się z dwóch części:

1) Frontend dostępny dla każdego użytkownika strony, który umożliwia wybranie miasta z listy predefinowanych miast i sprawdzenie stanu aktualnej pogody. W wypadku chwilowego braku połączenia z zewnętrznymi usługami rozwiązanie powinno wyświetlać ostatnie zapisane informacje z bazy danych. Aplikacja powinna umożliwiać odświeżenie informacji pogodowych bez przeładowania strony.

2) Backend dostępny wyłącznie dla administratora, który umożliwia:

* Skonfigurowanie adresu usługi sieciowej wykorzystywanej do pobierania danych. Do pobierania danych można skorzystać z usługi http://www.service-repository.com/service/overview/-2082028434 lub jakiegoś innego publicznie dostępnego serwera.

* Skonfigurowanie timeoutu dla zapytań SOAP.

* Edycję listy miast (dodawanie, usuwanie, edycja) przechowywanej w bazie danych.

Zalecane jest, aby rozwiązanie umożliwiało rozszerzenie swojej funkcjonalności również na innych 
dostawców danych pogodowych.

Aplikacja powinna opierać się o technologię PHP oraz posiadać czytelny i estetyczny dla oka wygląd. 

Poza tymi wymaganiami nie ma innych ograniczeń technologicznych. Jedynym ograniczeniem jest 
czas (3 dni).

Program powinien być jak najwyższej jakości i posiadać zaimplementowane wszystkie elementy 
działające od początku do końca.

Program powinien demonstrować rozsądne użycie możliwości języka w zakresie abstrakcji, 
interfejsów, dziedziczenia, dobrą strukturę klas i pokazywać dobre praktyki programistyczne. 

Zwracamy uwagę na jakość kodu i projekt. Mile widziany będzie jakiś szkic projektu.

Kod oraz interfejs programu powinien być napisany w języku angielskim.

Należy dostarczyć kod źródłowy aplikacji, zrzut bazy danych (rozwiązanie gotowe do uruchomienia) 
oraz krótką informację na temat wykonanego projektu (np. użyte technologie, ciekawe rozwiązania 
itp.).
