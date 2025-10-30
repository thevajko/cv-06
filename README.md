# VAII cvičenie 06

Momentálne je otvorená vetva __MAIN__, ktorá obsahuje _štartér_. Riešenie obsahuje vetva __SOLUTION__.

## Úlohy

Vytvorte jednoduchú aplikáciu, kde bude možné uverejňovať príspevky skladajúce sa z textu a fotografie. Implementujte všetky CRUD operácie.

1. Vytvorenie modelu pre entitu `Post`
    1. Použite SQL skript `ddl.posts_01.sql` na vytvorenie DB tabuľky v DB `vaiicko_db`.
    2. Do tabuľky vložte 3 riadky. Obrázky sa nachádzajú v adresári `uploads`.
    3. Vytvorte triedu pre model `Post` s rovnakými atribútmi, ako má tabuľka.
2. Zobrazenie príspevkov
    1. Pre príspevky vytvorte nový kontroler `PostController`.
    2. Načítajte záznamy o príspevkoch z DB a pošlite ich do pohľadu `index`. Použite súbor `snippets/post.snippet.view.php` a upravte ho tak, aby zobrazil
       všetky príspevky z DB.
    3. Pridajte odkaz na zobrazenie príspevkov do hlavného menu.
3. Pridávanie príspevkov
    1. Pridajte metódu pre zobrazenie formuláru na vloženie nového príspevku `add()`.
    2. Pridajte tlačidlo na pridanie príspevku do pohľadu `index`.
    3. Vytvorte pohľad pre formulár `form.view.php`. Vytvorte vlastný formulár, alebo použite súbor `snippets\post-form.snippet.view.php`. Obrázok
       vkladajte ako text externej URL. Doplňte správnu akciu pre formulár.
    4. Vytvorte pohľad `add.view.php` a vhodne do neho zakomponujte pohľad `form.view.php` tak, aby bolo možné použiť formulár opakovane.
    5. Doplňte metódu `save()` pre uloženie dát z formulára do DB a po jeho uložení presmerujte používateľa na zoznam príspevkov.
    6. Pridajte kontrolu na strane servera (obidva povinné polia, obrázok je len typu jpg, alebo png a text má aspoň 5 znakov).
       Zdrojový kód pre metódu na kontrolu chýb vo formulári nájdete v súbore `formErrors.snippet.php`. Upravte pohľad s formulárom tak, aby zobrazoval chyby.
4. Editácia príspevku
    1. Nastavte správnu akciu k tlačidlu `Upraviť` pri zobrazení príspevku.
    2. Vytvorte metódu `edit()` a pohľad `edit.view.php`. Môžete sa inšpirovať pohľadom `add.view.php`.
    3. Na editáciu použite formulár pre pridávanie príspevkov. Formulár upravte tak, aby zobrazoval dáta príspevku, ktorý upravujete. Nezabudnite, že pri
       editácii potrebujete aj `id` príspevku.
    4. Na ukladanie príspevku modifikujte metódu `save()` kontrolera `PostController`.
5. Zmazanie príspevku
    1. Nastavte správnu akciu k tlačidlu `Zmazať` pri zobrazení príspevku.
    2. Vytvorte metódu `delete()` v kontroleri `PostController`. Po zmazaní príspevku, presmerujte zobrazenie na `Home` stránku.
6. Upload obrázka (domáca úloha)
    1. Upravte formulár tak, aby bolo možné odosielať súbor s obrázkom. Nezabudnite pridať atribút `enctype="multipart/form-data"` do značky `<form>`.
    2. Spracujte poslané súbory tak, aby sa ukladali na webový server do adresára `public\uploads`. V prípade OS Linux je potrebné
       aj nastaviť práva na zápis pre všetkých.
    3. Upravte zobrazenie príspevkov tak, aby sa zobrazovali obrázky, ktoré ste nahrali.
    4. Zabezpečte, aby sa nestávalo, že používatelia si budú prepisovať obrázky, ak majú rovnaký názov.

## Ako nájsť vetvu môjho cvičenia?

Pokiaľ sa chcete dostať k riešeniu z cvičenia je potrebné otvoriť si príslušnú _vetvu_, ktorej názov sa skladá:

__MIESTNOST__ + "-" + __HODINA ZAČIATKU__ + "-" + __DEN__

Ak teda navštevujete cvičenie pondelok o 08:00 v RA323, tak sa vaša vetva bude volať: __RA323-08-PON__

# Použitý framework

Cvičenie používa framework vaííčko dostupný na repe [https://github.com/thevajko/vaiicko](https://github.com/thevajko/vaiicko)
