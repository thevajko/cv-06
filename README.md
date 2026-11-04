# VAII cvičenie 06

Momentálne je otvorená vetva __MASTER__, ktorá obsahuje _štartér_. Riešenie obsahuje vetva __SOLUTION__.

## Úlohy

Vytvorte jednoduchú aplikáciu, kde bude možné uverejňovať príspevky skladajúce sa z textu a fotografie. Implementujte
všetky CRUD operácie.

1. Vytvorenie modelu pre entitu `Post`
    1. Použite SQL skript `ddl.posts_01.sql` na vytvorenie DB tabuľky v DB `vaiicko_db`.
    2. Do tabuľky vložte 3 riadky. Odkazy na obrázky nájdite na internete.
    3. Vytvorte triedu pre model `Post` s rovnakými atribútmi, ako má tabuľka. Framework vyžaduje, aby model
       v statickom atribúte `$fillable` uvádzal, ktoré atribúty je možné nastaviť z formulára metódou
       `setFromRequest()`.
2. Zobrazenie príspevkov
    1. Pre príspevky vytvorte nový kontroler `PostController`.
    2. Načítajte záznamy o príspevkoch z DB a pošlite ich do pohľadu `index`. Použite súbor
       `snippets/post.snippet.view.php` a upravte ho tak, aby zobrazil všetky príspevky z DB. Dáta, ktoré zadal
       používateľ, vypisujte vždy cez funkciu `e()` (napr. `<?= e($post->getText()) ?>`), ktorá zabráni útoku XSS.
    3. Pridajte odkaz na zobrazenie príspevkov do hlavného menu.
3. Pridávanie príspevkov
    1. Pridajte metódu pre zobrazenie formuláru na vloženie nového príspevku `add()`.
    2. Pridajte tlačidlo na pridanie príspevku do pohľadu `index`.
    3. Vytvorte pohľad pre formulár `form.view.php`. Vytvorte vlastný formulár, alebo použite súbor
       `snippets/form.snippet.view.php`. Obrázok vkladajte ako text externej URL. Doplňte správnu akciu pre formulár.
    4. Vytvorte pohľad `add.view.php` (môžete použiť súbor `snippets/add.snippet.view.php`) a vhodne do neho
       zakomponujte pohľad `form.view.php` tak, aby bolo možné použiť formulár opakovane.
    5. Doplňte metódu `save()` pre uloženie dát z formulára do DB a po jeho uložení presmerujte používateľa na zoznam
       príspevkov.
4. Editácia príspevku
    1. Nastavte správnu akciu k tlačidlu `Upraviť` pri zobrazení príspevku.
    2. Vytvorte metódu `edit()` a pohľad `edit.view.php`. Môžete sa inšpirovať pohľadom `add.view.php`.
    3. Na editáciu použite formulár pre pridávanie príspevkov. Formulár upravte tak, aby zobrazoval dáta príspevku,
       ktorý upravujete. Nezabudnite, že pri editácii potrebujete aj `id` príspevku. Hodnoty vo formulári
       (atribút `value` aj obsah `<textarea>`) vypisujte tiež cez funkciu `e()`.
    4. Na ukladanie príspevku modifikujte metódu `save()` kontrolera `PostController`.
5. Zmazanie príspevku
    1. Nastavte správnu akciu formuláru s tlačidlom `Zmazať` pri zobrazení príspevku a doplňte do neho skryté pole
       s `id` príspevku. Mazanie mení dáta, preto ho posielajte metódou POST, nie ako odkaz (GET).
    2. Vytvorte metódu `delete()` v kontroleri `PostController`. Po zmazaní príspevku, presmerujte zobrazenie na zoznam
       príspevkov.

# Použitý framework

Cvičenie používa framework vaííčko dostupný na
repe [https://github.com/thevajko/vaiicko](https://github.com/thevajko/vaiicko)
