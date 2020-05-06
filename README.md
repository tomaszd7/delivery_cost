recruit_delivery_cost
==================================

# Wymagania 

Zadanie zbudowane jest na kontenerach dockerowych więc wymaga zainstalowanego dockera i docker-compose.
 

# Instrukcja

1. skopiuj .env.example i .env.dist jako .env (w katalogu głównym oraz app)
2. uruchom środowisko dockerowe

    > ./restart_application.sh  

3. na kontenerze php-fpm uruchom

    > composer install  
    php artisan migrate:fresh --seed  
    php artisan test

4. aplikacja jest dostępna pod adresem 
    > http://localhost:8050 
    
    
# Założenia rozwiązania

### Cel

Zadaniem jest naliczać koszty dostawy na zleceniu/ koszyku. 
Przyjąłem następujące założenia (model):

### Przyjęty model

1.  ustawienia kosztów trzymane są na linii koszyka (w danych produktu)
2.  każda linia/ produkt może mieć włączone lub wyłączone 4 rodzaje kosztów, 
które sumują się odpowiednio do koszyków na poziomie zlecenia: 
    * koszyk wartości
    * koszyk wagi
    * koszyk ilości
    * koszyk kosztów indywidualnych (z produktu)

    Koszyki można ustawiać dowolnie na produkcie (wszystkie/ żaden/ wybrane). 
    Koszyki nie mają priorytetów (nie nadpisują innych koszyków).  
3.  Obliczenie kosztów na zleceniu/ koszyku stanowi sumę wyliczonych koszyków kosztów
4.  Struktura tabel
    *   klienci, produkty (z polami kosztów)
    *   tabele do wyliczania kosztów z koszyków (po wartości, wadze i ilości sztuk)
    *   zlecenie/ linie zlecenia 
5. tabele do wyliczania kosztów bazują na id klienta, grupie klienta i formie płatności
6. niektóre własności są celowo uproszczone (np. grupa klienta, forma płatności)

### Techniczne

Rozwiązanie oparte jest na:
* docker 
* PHP 7.4 
* Laravelu 6 (skorzystałem z łatwego zarządzania baza danych i widokami)
* PhpUnit Test (dodałem Unit test dla wyliczania kosztów koszyków) 

