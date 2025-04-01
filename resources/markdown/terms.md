# Guia del Projecte

## Descripció del Projecte

Aquest projecte té com a objectiu principal la creació d'una aplicació web que permeti gestionar **vídeos**, incloent-hi la seva creació, visualització, i administració. A més, implementa funcionalitats bàsiques d'autenticació per garantir que només els usuaris autoritzats puguin interactuar amb els vídeos.

El sistema està pensat per ser **intuitiu, segur i fàcilment ampliable**, amb una arquitectura escalable que permet futures actualitzacions.

## Resum dels Sprints

### Sprint 1: Configuració inicial i funcionalitats bàsiques
1. **Configuració del projecte**:
    - Configuració inicial del framework Laravel.
    - Instal·lació de dependències necessàries i configuració del servidor local.
    - Configuració de la base de dades i migracions inicials.

2. **Creació del model Video**:
    - Definició de les columnes bàsiques per als vídeos, com ara title, description, i published_at.
    - Implementació de factories per facilitar la generació de dades de proves.

3. **Primers tests**:
    - Creació dels tests unitaris per assegurar el correcte funcionament de les funcions bàsiques del model Video.

### Sprint 2: Funcionalitats avançades i optimitzacions
1. **Visualització de vídeos**:
    - Creació de la ruta /videos/{id} per mostrar la informació detallada d'un vídeo.
    - Implementació de la pàgina amb estil personalitzat per a la visualització de vídeos.

2. **Gestió d'errors**:
    - Afegit d'una pàgina personalitzada per a errors 404 quan un vídeo no existeix.

3. **Millores als tests**:
    - Creació de tests funcionals per verificar la visualització de vídeos i el comportament davant vídeos inexistents.

Aquest document recull les accions realitzades durant el Sprint 3 del projecte de gestió de vídeos amb Laravel. S'han implementat diversos canvis i millores a l'aplicació.

### Sprint 3: Millores i Gestió de Permisos i Usuaris

1. **Corregir els errors del 2n Sprint**
    - S'han corregit els errors detectats en el 2n Sprint relacionats amb la visualització de vídeos i la gestió d'errors.

2. **Instal·lació del paquet spatie/laravel-permission**
    - S'ha instal·lat i configurat el paquet spatie/laravel-permission per gestionar els permisos d'usuaris de manera eficient.
    - S'han publicat les migracions i fitxers de configuració del paquet.

3. **Migració per afegir el camp super_admin a la taula users**
    - S'ha creat una migració per afegir el camp super_admin a la taula d'usuaris per poder identificar els usuaris amb permisos d'administrador superior.

4. **Afegir funcions al model User**
    - S'han afegit les funcions testedBy() i isSuperAdmin() al model User per gestionar els rols i permisos dels usuaris.

5. **Gestió de Permisos i Usuaris**
    - S'ha creat la funció create_default_professor per crear el professor per defecte amb permisos.
    - Es van crear les funcions create_regular_user(), create_video_manager_user(), i create_superadmin_user() per crear usuaris amb diferents rols i permisos.
    - La funció define_gates() es va implementar per definir les portes d'accés a diferents parts de l'aplicació.
    - La funció create_permissions() va ser afegida per definir els permisos relacionats amb la gestió de vídeos, com "view videos", "upload videos", "delete videos", i "manage users".

6. **Registre de polítiques d'autorització**
    - A la funció boot() de AppServiceProvider, s'han registrat les polítiques d'autorització i definides les portes d'accés necessàries.

7. **Publicació dels stubs**
    - Els stubs de Laravel s'han publicat per tal de personalitzar-los segons les necessitats del projecte.

8. **Tests**
    - S'han creat els tests necessaris per verificar el comportament dels usuaris amb diferents rols i permisos, incloent les funcions isSuperAdmin() i la gestió dels permisos en els vídeos.

### Sprint 4: Millores i Funcionalitats Addicionals

1. **Corregir els errors del 3r Sprint**
    - Corregir els errors detectats en el 3r Sprint, especialment assegurant que els usuaris amb permisos puguin accedir a la ruta /videos/manage.

2. **Crear VideosManageController**
    - Implementar les funcions testedBy, index, store, show, edit, update, delete i destroy.

3. **Crear la funció index a VideosController**
    - Implementar la funció index per mostrar tots els vídeos.

4. **Revisar vídeos creats a helpers i afegits al DatabaseSeeder**
    - Assegurar que hi ha 3 vídeos creats a helpers i afegits al DatabaseSeeder.

5. **Crear vistes per al CRUD de vídeos**
    - Crear les vistes resources/views/videos/manage/index.blade.php, resources/views/videos/manage/create.blade.php, resources/views/videos/manage/edit.blade.php, resources/views/videos/manage/delete.blade.php.

6. **Afegir taula del CRUD de vídeos a index.blade.php**
    - Implementar la taula del CRUD de vídeos a la vista index.blade.php.

7. **Afegir formulari per a vídeos a create.blade.php**
    - Implementar el formulari per afegir vídeos a create.blade.php, utilitzant l'atribut data-qa per facilitar els tests.

8. **Afegir taula del CRUD de vídeos a edit.blade.php**
    - Implementar la taula del CRUD de vídeos a edit.blade.php.

9. **Afegir confirmació d'eliminació a delete.blade.php**
    - Implementar la confirmació d'eliminació del vídeo a delete.blade.php.

10. **Crear vista de resources/views/videos/index.blade.php**
    - Implementar la vista per mostrar tots els vídeos, similar a la pàgina principal de YouTube, amb enllaços al detall del vídeo.

11. **Modificar test user_with_permissions_can_manage_videos()**
    - Assegurar que el test inclou 3 vídeos.

12. **Crear permisos de vídeos per al CRUD a helpers**
    - Crear els permisos necessaris per al CRUD de vídeos i assignar-los als usuaris corresponents.

13. **Crear funcions de test a VideoTest**
    - Implementar les funcions user_without_permissions_can_see_default_videos_page, user_with_permissions_can_see_default_videos_page, not_logged_users_can_see_default_videos_page.

14. **Crear funcions de test a VideosManageControllerTest**
    - Implementar les funcions loginAsVideoManager, loginAsSuperAdmin, loginAsRegularUser, user_with_permissions_can_see_add_videos, user_without_videos_manage_create_cannot_see_add_videos, user_with_permissions_can_store_videos, user_without_permissions_cannot_store_videos, user_with_permissions_can_destroy_videos, user_without_permissions_cannot_destroy_videos, user_with_permissions_can_see_edit_videos, user_without_permissions_cannot_see_edit_videos, user_with_permissions_can_update_videos, user_without_permissions_cannot_update_videos, user_with_permissions_can_manage_videos, regular_users_cannot_manage_videos, guest_users_cannot_manage_videos, superadmins_can_manage_videos.

15. **Crear rutes de videos/manage per al CRUD de vídeos**
    - Implementar les rutes amb el middleware corresponent i assegurar que les rutes del CRUD només apareixen quan l'usuari està logejat, mentre que la ruta d'índex és accessible tant per usuaris logejats com no logejats.

16. **Afegir navbar i footer a la plantilla resources/layouts/videosapp**
    - Implementar la navegació entre pàgines amb una barra de navegació i un peu de pàgina.

17. **Afegir a resources/markdown/terms el que s'ha fet al sprint**
    - Documentar les accions realitzades durant el Sprint 4 a resources/markdown/terms.

18. **Comprovar en Larastan tots els fitxers creats**
    - Verificar que tots els fitxers creats passen les comprovacions de Larastan.

## Sprint 5: Implementació de Gestió d'Usuaris i Millores
1. Resolució d'Incidències del Sprint Anterior
   Revisió exhaustiva dels problemes detectats en el Sprint 4

Correcció d'errors funcionals i d'integracó

Verificació de totes les funcionalitats afectades

2. Integració de Relació Usuari-Vídeo
   Ampliació de l'esquema de base de dades per incloure user_id a la taula de vídeos

Actualització del model Video per gestionar la relació belongsTo amb User

Adaptació dels controladors per assignar automàticament l'usuari creador

3. Adequació de Testos Existents
   Revisió i actualització de testos afectats pels canvis

Assegurament de la compatibilitat amb les noves funcionalitats

4. Desenvolupament del Controlador de Gestió d'Usuaris
   Implementació completa de UsersManageController amb:

Gestió de permisos (ACL)

Operacions CRUD completes

Validació de dades

5. Ampliació del UsersController
   Nova funcionalitat de llistat d'usuaris (index)

Vista detallada d'usuari (show) amb informació relacionada

6. Implementació de Vistes Administratives
   Sistema complet de plantilles per a:

Llistat paginat d'usuaris

Formularis de creació/edició

Confirmació d'eliminació

Disseny responsive amb components reutilitzables

7. Vista Pública d'Usuaris
   Pàgina de llistat accessible als usuaris registrats

Integració amb el sistema de cerca

Visualització de vídeos associats per usuari

8. Sistema de Permisos Avançat
   Implementació de policies per a:

Creació d'usuaris

Modificació de perfils

Eliminació controlada

Assignació de privilegis a rols específics

9. Suite de Testos Ampliada
   Noves proves unitàries per a:

Control d'accés diferencial

Visualització de pàgines

Operacions administratives

Validació de restriccions de seguretat

10. Testos Específics de Gestió
    Verificació de permisos per:

Superadministradors

Gestors de contingut

Usuaris regulars

Visitants no autenticats

11. Definició de Rutes Protegides
    Configuració d'endpoints per a:

Operacions administratives

Consulta pública

Gestió d'usuaris

Aplicació de middlewares de seguretat

12. Millores d'Experiència d'Usuari
    Sistema de navegació millorat

Paginació avançada

Feedback visual per operacions

13. Documentació Tècnica
    Manual d'implementació detallat

Guia de resolució d'errors

Registre de decisions tècniques

Informe d'analisi estàtic

14. Qualitat de Codi
    Anàlisi continu amb Larastan

Correcció d'incidències de tipus

Optimització d'estructures

Documentació de millores
