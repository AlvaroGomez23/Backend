# README PRÀCTICA 4 // ALVARO GOMEZ
## CONTROLADOR
### controladorArticlesPersonals.php
Aquest controlador controla els articles que té un sol usuari. S'encarrega d'agafar-los i mostrarlos a la vista privada de l'usuari.

### controladorCambiarPsw.php
S'encarrega de fer les comprovacions necessàries per que l'usuari pugui cambiar la contrasenya.

### controladorGeneral.php
És un controlador que gestiona tota la part d'inserir, modificar, mostrar i eliminar articles de la base de dades.

### controladorLogin.php
Controla que l'usuari pugui entrar al seu compte una vegada que ja s'ha registrat.

### controladorSignin.php
Gestiona les dades que l'usuari passa mitjançant el formulari per enregistrar-se a la pàgina web.

## MODEL
# modelGeneral.php
Gestiona els articles a la base de dades, és a dir:
Inserta, modifica, mostra i elimina els articles.
S'han fet algunes modificacions per poder controlar que l'usuari no pugui eliminar o modificar articles d'altres usuaris.

# modelUsuaris.php
Encarregat de gestionar tot el que estigui relacionat amb els usuaris a la base de dades.
Totes les funcions que corresponguin amb l'usuari com Sign In o Log In, tindràn relació amb el modelUsuaris.php.

## VISTA
### index.php
Vista que té l'usuari anònim.

### vistaBotons.php
Vista feta per la pràctica 3 pero que ara està en desus.

### vistaCambiarPsw.php
Vista amb la que es trobarà l'usuari quan vulgui cambiar la contrasenya.

### vistaLogin.php
Vista amb la que interactuarà l'usuari quan vulgui logar-se.

### vistaPerfil.php
Vista que trobarà l'usuari al clicar al botó perfil quan estigui logat. Té 2 botons, un per tancar la sessió i altre per modificar la contrasenya.

### vistaSignin.php
Vista que es trobarà l'usuari anònim quan intenti registrar-se al lloc web.

## vistaUsuari.php
Vista que trobarà l'usuari una vegada s'hagi logat.

# ESPECIFICACIONS EXTRES
## Botons de modificar i eliminar
Una vegada s'hagi logat l'usuari i hagi creat un article, abaix de cada article sortirà un llapis (modificar) i una paperera (eliminar). Aquests dos botons només redirigeixen a les vistes de modificar i eliminar

S'intenten fer totes les comprovacions possibles abans de enviar les dades al model. (Si hi han algunes comprovacions que depenguin de true o false com comprovar la contrasenya, es fa una funcio que returni un booleà).


# USUARIS DE PROVA
## PEDRO
Mail: pedro@sapalomera.cat
Contrasenya: Pedro_1234
ID: 1
## Antonio
Mail: antonio@sapalomera.cat
Contrasenya: Antonio_1234
ID: 2
## Jose
Mail: jose@sapalomera.cat
Contrasenya: Jose_1234
ID: 3
## Marta
Mail: marta@saplomera.cat
Contrasenya: Marta_1234
ID: 4
## Xavi (Usuari amb contrasenya curta)
Mail: xavi@sapalomera.cat
Contrasenya: 1234
ID: 5