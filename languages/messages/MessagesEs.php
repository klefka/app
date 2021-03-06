<?php
/** Spanish (Español)
 *
 * See MessagesQqq.php for message documentation incl. usage of parameters
 * To improve a translation please visit http://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 * @author Aleator
 * @author Alhen
 * @author Alpertron
 * @author Alvaro qc
 * @author Armando-Martin
 * @author Ascánder
 * @author Baiji
 * @author Bea.miau
 * @author Bengoa
 * @author Bernardom
 * @author Better
 * @author BicScope
 * @author Boivie
 * @author Candalua
 * @author Capmo
 * @author Cerealito
 * @author Clerc
 * @author Crazymadlover
 * @author Cvmontuy
 * @author Danke7
 * @author David0811
 * @author Dferg
 * @author Diego Grez
 * @author Dmcdevit
 * @author Drini
 * @author Dvortygirl
 * @author Fibonacci
 * @author Fitoschido
 * @author Fluence
 * @author Gustronico
 * @author Hercule
 * @author Icvav
 * @author Imre
 * @author Jatrobat
 * @author Jens Liebenau
 * @author Jurock
 * @author Kaganer
 * @author Lin linao
 * @author Linterweb
 * @author Locos epraix
 * @author Mahadeva
 * @author Manuelt15
 * @author McDutchie
 * @author Muro de Aguas
 * @author Omnipaedista
 * @author Orgullomoore
 * @author Paucabot
 * @author PerroVerd
 * @author Pertile
 * @author Piolinfax
 * @author Platonides
 * @author PoLuX124
 * @author Remember the dot
 * @author Richard Wolf VI
 * @author Sanbec
 * @author Spacebirdy
 * @author Technorum
 * @author The Evil IP address
 * @author Titoxd
 * @author Toniher
 * @author Translationista
 * @author Urhixidur
 * @author VegaDark
 * @author Vivaelcelta
 * @author Wilfredor
 * @author XalD
 * @author XanaG
 * @author לערי ריינהארט
 */

$namespaceNames = array(
	NS_MEDIA            => 'Medio',
	NS_SPECIAL          => 'Especial',
	NS_TALK             => 'Discusión',
	NS_USER             => 'Usuario',
	NS_USER_TALK        => 'Usuario_discusión',
	NS_PROJECT_TALK     => '$1_discusión',
	NS_FILE             => 'Archivo',
	NS_FILE_TALK        => 'Archivo_discusión',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'MediaWiki_discusión',
	NS_TEMPLATE         => 'Plantilla',
	NS_TEMPLATE_TALK    => 'Plantilla_discusión',
	NS_HELP             => 'Ayuda',
	NS_HELP_TALK        => 'Ayuda_discusión',
	NS_CATEGORY         => 'Categoría',
	NS_CATEGORY_TALK    => 'Categoría_discusión',
);

$namespaceAliases = array(
	'Imagen' => NS_FILE,
	'Imagen_Discusión' => NS_FILE_TALK,
);

$namespaceGenderAliases = array(
	NS_USER => array( 'male' => 'Usuario', 'female' => 'Usuaria' ),
	NS_USER_TALK => array( 'male' => 'Usuario_Discusión', 'female' => 'Usuaria_Discusión' ),
);


$specialPageAliases = array(
	'Activeusers'               => array( 'UsuariosActivos' ),
	'Allmessages'               => array( 'TodosLosMensajes' ),
	'Allpages'                  => array( 'Todas', 'Todas_las_páginas' ),
	'Ancientpages'              => array( 'PáginasAntiguas', 'Páginas_antiguas' ),
	'Badtitle'                  => array( 'Título_incorrecto' ),
	'Blankpage'                 => array( 'BlanquearPágina', 'Blanquear_página' ),
	'Block'                     => array( 'Bloquear' ),
	'Blockme'                   => array( 'Bloquearme' ),
	'Booksources'               => array( 'FuentesDeLibros', 'Fuentes_de_libros' ),
	'BrokenRedirects'           => array( 'RedireccionesRotas', 'Redirecciones_rotas' ),
	'Categories'                => array( 'Categorías' ),
	'ChangeEmail'               => array( 'CambiarEmail', 'CambiarCorreo' ),
	'ChangePassword'            => array( 'Cambiar_contraseña', 'CambiarContraseña', 'ResetearContraseña', 'Resetear_contraseña' ),
	'ComparePages'              => array( 'CompararPáginas' ),
	'Confirmemail'              => array( 'ConfirmarEmail', 'Confirmar_e-mail' ),
	'Contributions'             => array( 'Contribuciones' ),
	'CreateAccount'             => array( 'Crear_una_cuenta', 'CrearCuenta' ),
	'Deadendpages'              => array( 'PáginasSinSalida', 'Páginas_sin_salida' ),
	'DeletedContributions'      => array( 'ContribucionesBorradas', 'Contribuciones_Borradas' ),
	'Disambiguations'           => array( 'Desambiguaciones', 'Desambiguación' ),
	'DoubleRedirects'           => array( 'RedireccionesDobles', 'Redirecciones_dobles' ),
	'EditWatchlist'             => array( 'EditarSeguimiento' ),
	'Emailuser'                 => array( 'MandarEmailUsuario' ),
	'Export'                    => array( 'Exportar' ),
	'Fewestrevisions'           => array( 'MenosEdiciones', 'Menos_ediciones' ),
	'FileDuplicateSearch'       => array( 'BuscarArchivosDuplicados', 'Buscar_archivos_duplicados' ),
	'Filepath'                  => array( 'RutaDeArchivo', 'Ruta_de_archivo' ),
	'Import'                    => array( 'Importar' ),
	'Invalidateemail'           => array( 'InvalidarEmail', 'Invalidar_e-mail' ),
	'BlockList'                 => array( 'UsuariosBloqueados', 'Lista_de_usuarios_bloqueados' ),
	'LinkSearch'                => array( 'BúsquedaDeEnlaces', 'Búsqueda_de_enlaces' ),
	'Listadmins'                => array( 'ListaDeAdministradores', 'Lista_de_administradores' ),
	'Listbots'                  => array( 'ListaDeBots', 'Lista_de_bots' ),
	'Listfiles'                 => array( 'ListaImágenes', 'Lista_de_imágenes' ),
	'Listgrouprights'           => array( 'ListaDerechosGrupos', 'Derechos_de_grupos_de_usuarios' ),
	'Listredirects'             => array( 'TodasLasRedirecciones', 'Todas_las_redirecciones' ),
	'Listusers'                 => array( 'ListaUsuarios', 'Lista_de_usuarios' ),
	'Lockdb'                    => array( 'BloquearBasedeDatos', 'Bloquear_base_de_datos' ),
	'Log'                       => array( 'Registro' ),
	'Lonelypages'               => array( 'PáginasHuérfanas', 'Páginas_huérfanas' ),
	'Longpages'                 => array( 'PáginasLargas', 'Páginas_largas' ),
	'MergeHistory'              => array( 'FusionarHistorial', 'Fusionar_historial' ),
	'MIMEsearch'                => array( 'BuscarPorMIME', 'Buscar_por_MIME' ),
	'Mostcategories'            => array( 'MásCategorizadas', 'Más_categorizadas' ),
	'Mostimages'                => array( 'MásImágenes', 'Con_más_imágenes' ),
	'Mostlinked'                => array( 'MásEnlazados', 'Más_enlazados', 'MásEnlazadas' ),
	'Mostlinkedcategories'      => array( 'CategoríasMásUsadas', 'Categorías_más_usadas' ),
	'Mostlinkedtemplates'       => array( 'PlantillasMásUsadas', 'Plantillas_más_usadas' ),
	'Mostrevisions'             => array( 'MásEdiciones', 'Más_ediciones' ),
	'Movepage'                  => array( 'MoverPágina', 'Mover_página' ),
	'Mycontributions'           => array( 'MisContribuciones', 'Mis_contribuciones' ),
	'Mypage'                    => array( 'MiPágina', 'Mi_página' ),
	'Mytalk'                    => array( 'MiDiscusión', 'Mi_discusión' ),
	'Myuploads'                 => array( 'MisArchivosSubidos' ),
	'Newimages'                 => array( 'NuevasImágenes', 'Nuevas_imágenes' ),
	'Newpages'                  => array( 'PáginasNuevas', 'Páginas_nuevas' ),
	'PasswordReset'             => array( 'RestablecerContraseña' ),
	'Popularpages'              => array( 'PáginasMásVisitadas', 'PáginasPopulares', 'Páginas_más_visitadas' ),
	'Preferences'               => array( 'Preferencias' ),
	'Prefixindex'               => array( 'PáginasPorPrefijo', 'Páginas_por_prefijo' ),
	'Protectedpages'            => array( 'PáginasProtegidas', 'Páginas_protegidas' ),
	'Protectedtitles'           => array( 'TítulosProtegidos', 'Títulos_protegidos' ),
	'Randompage'                => array( 'Aleatoria', 'Aleatorio', 'Página_aleatoria' ),
	'Randomredirect'            => array( 'RedirecciónAleatoria', 'Redirección_aleatoria' ),
	'Recentchanges'             => array( 'CambiosRecientes', 'Cambios_recientes' ),
	'Recentchangeslinked'       => array( 'CambiosEnEnlazadas', 'Cambios_en_enlazadas' ),
	'Revisiondelete'            => array( 'BorrarRevisión', 'Borrar_revisión' ),
	'RevisionMove'              => array( 'MoverRevision' ),
	'Search'                    => array( 'Buscar' ),
	'Shortpages'                => array( 'PáginasCortas', 'Páginas_cortas' ),
	'Specialpages'              => array( 'PáginasEspeciales', 'Páginas_especiales' ),
	'Statistics'                => array( 'Estadísticas' ),
	'Tags'                      => array( 'Etiquetas' ),
	'Unblock'                   => array( 'Desbloquear' ),
	'Uncategorizedcategories'   => array( 'CategoríasSinCategorizar', 'Categorías_sin_categorizar' ),
	'Uncategorizedimages'       => array( 'ImágenesSinCategorizar', 'Imágenes_sin_categorizar' ),
	'Uncategorizedpages'        => array( 'PáginasSinCategorizar', 'Páginas_sin_categorizar' ),
	'Uncategorizedtemplates'    => array( 'PlantillasSinCategorizar', 'Plantillas_sin_categorizar' ),
	'Undelete'                  => array( 'Restaurar' ),
	'Unlockdb'                  => array( 'DesbloquearBasedeDatos', 'Desbloquear_base_de_datos' ),
	'Unusedcategories'          => array( 'CategoríasSinUso', 'Categorías_sin_uso' ),
	'Unusedimages'              => array( 'ImágenesSinUso', 'Imágenes_sin_uso' ),
	'Unusedtemplates'           => array( 'PlantillasSinUso', 'Plantillas_sin_uso' ),
	'Unwatchedpages'            => array( 'PáginasSinVigilar', 'Páginas_sin_vigilar' ),
	'Upload'                    => array( 'SubirArchivo', 'Subir_archivo' ),
	'Userlogin'                 => array( 'Entrar', 'Entrada_del_usuario' ),
	'Userlogout'                => array( 'Salida_del_usuario', 'Salir' ),
	'Userrights'                => array( 'PermisosUsuarios', 'Permisos_de_usuarios' ),
	'Version'                   => array( 'Versión' ),
	'Wantedcategories'          => array( 'CategoríasRequeridas', 'Categorías_requeridas' ),
	'Wantedfiles'               => array( 'ArchivosRequeridos', 'Archivos_requeridos' ),
	'Wantedpages'               => array( 'PáginasRequeridas', 'Páginas_requeridas' ),
	'Wantedtemplates'           => array( 'PlantillasRequeridas', 'Plantillas_requeridas' ),
	'Watchlist'                 => array( 'Seguimiento', 'Lista_de_seguimiento' ),
	'Whatlinkshere'             => array( 'LoQueEnlazaAquí', 'Lo_que_enlaza_aquí' ),
	'Withoutinterwiki'          => array( 'SinInterwikis', 'Sin_interwikis' ),
);

$magicWords = array(
	'redirect'                => array( '0', '#REDIRECCIÓN', '#REDIRECCION', '#REDIRECT' ),
	'notoc'                   => array( '0', '__NOTDC__', '__NOTOC__' ),
	'nogallery'               => array( '0', '__NOGALERÍA__', '__NOGALERIA__', '__NOGALLERY__' ),
	'forcetoc'                => array( '0', '__FORZARTDC__', '__FORZARTOC__', '__FORCETOC__' ),
	'toc'                     => array( '0', '__TDC__', '__TOC__' ),
	'noeditsection'           => array( '0', '__NOEDITARSECCIÓN__', '__NOEDITARSECCION__', '__NOEDITSECTION__' ),
	'noheader'                => array( '0', '__NOTÍTULO__', '__NOTITULO__', '__NOHEADER__' ),
	'currentmonth'            => array( '1', 'MESACTUAL', 'MESACTUAL2', 'CURRENTMONTH', 'CURRENTMONTH2' ),
	'currentmonth1'           => array( '1', 'MESACTUAL1', 'CURRENTMONTH1' ),
	'currentmonthname'        => array( '1', 'MESACTUALCOMPLETO', 'NOMBREMESACTUAL', 'CURRENTMONTHNAME' ),
	'currentmonthnamegen'     => array( '1', 'MESACTUALGENITIVO', 'CURRENTMONTHNAMEGEN', 'GENERADORNOMBREMESACTUAL' ),
	'currentmonthabbrev'      => array( '1', 'MESACTUALABREVIADO', 'CURRENTMONTHABBREV', 'ABREVIACIONNOMBREMESACTUAL' ),
	'currentday'              => array( '1', 'DÍAACTUAL', 'DIAACTUAL', 'DÍA_ACTUAL', 'DIA_ACTUAL', 'CURRENTDAY' ),
	'currentday2'             => array( '1', 'DÍAACTUAL2', 'DIAACTUAL2', 'DÍA_ACTUAL2', 'DIA_ACTUAL2', 'CURRENTDAY2' ),
	'currentdayname'          => array( '1', 'NOMBREDÍAACTUAL', 'NOMBREDIAACTUAL', 'CURRENTDAYNAME' ),
	'currentyear'             => array( '1', 'AÑOACTUAL', 'AÑO_ACTUAL', 'CURRENTYEAR' ),
	'currenttime'             => array( '1', 'HORA_MINUTOS_ACTUAL', 'HORAMINUTOSACTUAL', 'TIEMPOACTUAL', 'CURRENTTIME' ),
	'currenthour'             => array( '1', 'HORAACTUAL', 'HORA_ACTUAL', 'CURRENTHOUR', 'HORA_MINUTOS_ACTUAL' ),
	'localmonth'              => array( '1', 'MESLOCAL', 'MESLOCAL2', 'LOCALMONTH', 'LOCALMONTH2' ),
	'localmonth1'             => array( '1', 'MESLOCAL1', 'LOCALMONTH1' ),
	'localmonthname'          => array( '1', 'MESLOCALCOMPLETO', 'NOMBREMESLOCAL', 'LOCALMONTHNAME' ),
	'localmonthnamegen'       => array( '1', 'MESLOCALGENITIVO', 'LOCALMONTHNAMEGEN', 'GENERADORNOMBREMESLOCAL' ),
	'localmonthabbrev'        => array( '1', 'MESLOCALABREVIADO', 'LOCALMONTHABBREV', 'ABREVIACIONMESLOCAL' ),
	'localday'                => array( '1', 'DÍALOCAL', 'DIALOCAL', 'LOCALDAY' ),
	'localday2'               => array( '1', 'DIALOCAL2', 'DÍALOCAL2', 'LOCALDAY2' ),
	'localdayname'            => array( '1', 'NOMBREDIALOCAL', 'NOMBREDÍALOCAL', 'LOCALDAYNAME' ),
	'localyear'               => array( '1', 'AÑOLOCAL', 'LOCALYEAR' ),
	'localtime'               => array( '1', 'HORAMINUTOSLOCAL', 'TIEMPOLOCAL', 'LOCALTIME', 'HORALOCAL' ),
	'localhour'               => array( '1', 'HORALOCAL', 'LOCALHOUR', 'HORAMINUTOSLOCAL' ),
	'numberofpages'           => array( '1', 'NÚMERODEPÁGINAS', 'NUMERODEPAGINAS', 'NUMBEROFPAGES' ),
	'numberofarticles'        => array( '1', 'NÚMERODEARTÍCULOS', 'NUMERODEARTICULOS', 'NUMBEROFARTICLES' ),
	'numberoffiles'           => array( '1', 'NÚMERODEARCHIVOS', 'NUMERODEARCHIVOS', 'NUMBEROFFILES' ),
	'numberofusers'           => array( '1', 'NÚMERODEUSUARIOS', 'NUMERODEUSUARIOS', 'NUMBEROFUSERS' ),
	'numberofactiveusers'     => array( '1', 'NÚMERODEUSUARIOSACTIVOS', 'NUMERODEUSUARIOSACTIVOS', 'NUMBEROFACTIVEUSERS' ),
	'numberofedits'           => array( '1', 'NÚMERODEEDICIONES', 'NUMERODEEDICIONES', 'NUMBEROFEDITS' ),
	'numberofviews'           => array( '1', 'NÚMERODEVISTAS', 'NUMERODEVISTAS', 'NUMBEROFVIEWS' ),
	'pagename'                => array( '1', 'NOMBREDEPAGINA', 'NOMBREDEPÁGINA', 'PAGENAME' ),
	'pagenamee'               => array( '1', 'NOMBREDEPAGINAC', 'NOMBREDEPÁGINAC', 'PAGENAMEE' ),
	'namespace'               => array( '1', 'ESPACIODENOMBRE', 'NAMESPACE' ),
	'namespacee'              => array( '1', 'ESPACIODENOMBREC', 'NAMESPACEE' ),
	'talkspace'               => array( '1', 'ESPACIODEDISCUSION', 'ESPACIODEDISCUSIÓN', 'TALKSPACE' ),
	'talkspacee'              => array( '1', 'ESPACIODEDISCUSIONC', 'TALKSPACEE' ),
	'subjectspace'            => array( '1', 'ESPACIODEASUNTO', 'ESPACIODETEMA', 'ESPACIODEARTÍCULO', 'ESPACIODEARTICULO', 'SUBJECTSPACE', 'ARTICLESPACE' ),
	'subjectspacee'           => array( '1', 'ESPACIODETEMAC', 'ESPACIODEASUNTOC', 'ESPACIODEARTICULOC', 'ESPACIODEARTÍCULOC', 'SUBJECTSPACEE', 'ARTICLESPACEE' ),
	'fullpagename'            => array( '1', 'NOMBRECOMPLETODEPÁGINA', 'NOMBRECOMPLETODEPAGINA', 'FULLPAGENAME' ),
	'fullpagenamee'           => array( '1', 'NOMBRECOMPLETODEPAGINAC', 'NOMBRECOMPLETODEPÁGINAC', 'FULLPAGENAMEE' ),
	'subpagename'             => array( '1', 'NOMBREDESUBPAGINA', 'NOMBREDESUBPÁGINA', 'SUBPAGENAME' ),
	'subpagenamee'            => array( '1', 'NOMBREDESUBPAGINAC', 'NOMBREDESUBPÁGINAC', 'SUBPAGENAMEE' ),
	'basepagename'            => array( '1', 'NOMBREDEPAGINABASE', 'NOMBREDEPÁGINABASE', 'BASEPAGENAME' ),
	'basepagenamee'           => array( '1', 'NOMBREDEPAGINABASEC', 'NOMBREDEPÁGINABASEC', 'BASEPAGENAMEE' ),
	'talkpagename'            => array( '1', 'NOMBREDEPÁGINADEDISCUSIÓN', 'NOMBREDEPAGINADEDISCUSION', 'NOMBREDEPAGINADISCUSION', 'NOMBREDEPÁGINADISCUSIÓN', 'TALKPAGENAME' ),
	'talkpagenamee'           => array( '1', 'NOMBREDEPÁGINADEDISCUSIÓNC', 'NOMBREDEPAGINADEDISCUSIONC', 'NOMBREDEPAGINADISCUSIONC', 'NOMBREDEPÁGINADISCUSIÓNC', 'TALKPAGENAMEE' ),
	'subjectpagename'         => array( '1', 'NOMBREDEPAGINADETEMA', 'NOMBREDEPÁGINADETEMA', 'NOMBREDEPÁGINADEASUNTO', 'NOMBREDEPAGINADEASUNTO', 'NOMBREDEPAGINADEARTICULO', 'NOMBREDEPÁGINADEARTÍCULO', 'SUBJECTPAGENAME', 'ARTICLEPAGENAME' ),
	'subjectpagenamee'        => array( '1', 'NOMBREDEPAGINADETEMAC', 'NOMBREDEPÁGINADETEMAC', 'NOMBREDEPÁGINADEASUNTOC', 'NOMBREDEPAGINADEASUNTOC', 'NOMBREDEPAGINADEARTICULOC', 'NOMBREDEPÁGINADEARTÍCULOC', 'SUBJECTPAGENAMEE', 'ARTICLEPAGENAMEE' ),
	'msg'                     => array( '0', 'MSJ:', 'MSG:' ),
	'img_thumbnail'           => array( '1', 'miniaturadeimagen', 'miniatura', 'mini', 'thumbnail', 'thumb' ),
	'img_manualthumb'         => array( '1', 'miniaturadeimagen=$1', 'miniatura=$1', 'thumbnail=$1', 'thumb=$1' ),
	'img_right'               => array( '1', 'derecha', 'dcha', 'der', 'right' ),
	'img_left'                => array( '1', 'izquierda', 'izda', 'izq', 'left' ),
	'img_none'                => array( '1', 'ninguna', 'nada', 'no', 'ninguno', 'none' ),
	'img_center'              => array( '1', 'centro', 'centrado', 'centrada', 'centrar', 'center', 'centre' ),
	'img_framed'              => array( '1', 'marco', 'enmarcado', 'enmarcada', 'framed', 'enframed', 'frame' ),
	'img_frameless'           => array( '1', 'sinmarco', 'sin_enmarcar', 'sinenmarcar', 'frameless' ),
	'img_page'                => array( '1', 'pagina=$1', 'página=$1', 'pagina_$1', 'página $1', 'page=$1', 'page $1' ),
	'img_border'              => array( '1', 'borde', 'border' ),
	'img_link'                => array( '1', 'vínculo=$1', 'vinculo=$1', 'enlace=$1', 'link=$1' ),
	'sitename'                => array( '1', 'NOMBREDELSITIO', 'SITENAME', 'NOMBREDESITIO' ),
	'ns'                      => array( '0', 'EN:', 'NS:' ),
	'localurl'                => array( '0', 'URLLOCAL', 'LOCALURL:' ),
	'localurle'               => array( '0', 'URLLOCALC:', 'LOCALURLE:' ),
	'server'                  => array( '0', 'SERVIDOR', 'SERVER' ),
	'servername'              => array( '0', 'NOMBRESERVIDOR', 'SERVERNAME' ),
	'scriptpath'              => array( '0', 'RUTASCRIPT', 'RUTADESCRIPT', 'SCRIPTPATH' ),
	'stylepath'               => array( '0', 'RUTAESTILO', 'RUTADEESTILO', 'STYLEPATH' ),
	'grammar'                 => array( '0', 'GRAMATICA:', 'GRAMÁTICA:', 'GRAMMAR:' ),
	'gender'                  => array( '0', 'GÉNERO:', 'GENERO:', 'GENDER:' ),
	'notitleconvert'          => array( '0', '__NOCONVERTIRTITULO__', '__NOCONVERTIRTÍTULO__', '__NOCT___', '__NOTITLECONVERT__', '__NOTC__' ),
	'nocontentconvert'        => array( '0', '__NOCONVERTIRCONTENIDO__', '__NOCC___', '__NOCONTENTCONVERT__', '__NOCC__' ),
	'currentweek'             => array( '1', 'SEMANAACTUAL', 'CURRENTWEEK' ),
	'currentdow'              => array( '1', 'DDSACTUAL', 'DIADESEMANAACTUAL', 'DÍADESEMANAACTUAL', 'CURRENTDOW' ),
	'localweek'               => array( '1', 'SEMANALOCAL', 'LOCALWEEK' ),
	'localdow'                => array( '1', 'DDSLOCAL', 'DIADESEMANALOCAL', 'DÍADESEMANALOCAL', 'LOCALDOW' ),
	'revisionid'              => array( '1', 'IDDEREVISION', 'IDREVISION', 'IDDEREVISIÓN', 'IDREVISIÓN', 'REVISIONID' ),
	'revisionday'             => array( '1', 'DIADEREVISION', 'DIAREVISION', 'DÍADEREVISIÓN', 'DÍAREVISIÓN', 'REVISIONDAY' ),
	'revisionday2'            => array( '1', 'DIADEREVISION2', 'DIAREVISION2', 'DÍADEREVISIÓN2', 'DÍAREVISIÓN2', 'REVISIONDAY2' ),
	'revisionmonth'           => array( '1', 'MESDEREVISION', 'MESDEREVISIÓN', 'MESREVISION', 'MESREVISIÓN', 'REVISIONMONTH' ),
	'revisionyear'            => array( '1', 'AÑODEREVISION', 'AÑODEREVISIÓN', 'AÑOREVISION', 'AÑOREVISIÓN', 'REVISIONYEAR' ),
	'revisiontimestamp'       => array( '1', 'MARCADEHORADEREVISION', 'MARCADEHORADEREVISIÓN', 'REVISIONTIMESTAMP' ),
	'revisionuser'            => array( '1', 'USUARIODEREVISION', 'USUARIODEREVISIÓN', 'REVISIONUSER' ),
	'fullurl'                 => array( '0', 'URLCOMPLETA:', 'FULLURL:' ),
	'fullurle'                => array( '0', 'URLCOMPLETAC:', 'FULLURLE:' ),
	'lcfirst'                 => array( '0', 'PRIMEROMINUS;', 'PRIMEROMINÚS:', 'LCFIRST:' ),
	'ucfirst'                 => array( '0', 'PRIMEROMAYUS;', 'PRIMEROMAYÚS:', 'UCFIRST:' ),
	'lc'                      => array( '0', 'MINUS:', 'MINÚS:', 'LC:' ),
	'uc'                      => array( '0', 'MAYUS:', 'MAYÚS:', 'UC:' ),
	'displaytitle'            => array( '1', 'MOSTRARTÍTULO', 'MOSTRARTITULO', 'DISPLAYTITLE' ),
	'newsectionlink'          => array( '1', '__VINCULARANUEVASECCION__', 'VÍNCULARANUEVASECCIÓN__', '__NEWSECTIONLINK__' ),
	'nonewsectionlink'        => array( '1', '__NOVINCULARANUEVASECCION__', 'NOVÍNCULARANUEVASECCIÓN__', '__NONEWSECTIONLINK__' ),
	'currentversion'          => array( '1', 'VERSIONACTUAL', 'VERSIÓNACTUAL', 'CURRENTVERSION' ),
	'urlencode'               => array( '0', 'CODIFICARURL:', 'URLENCODE:' ),
	'currenttimestamp'        => array( '1', 'MARCADEHORAACTUAL', 'CURRENTTIMESTAMP' ),
	'localtimestamp'          => array( '1', 'MARCADEHORALOCAL', 'LOCALTIMESTAMP' ),
	'language'                => array( '0', '#IDIOMA:', '#LANGUAGE:' ),
	'contentlanguage'         => array( '1', 'IDIOMADELCONTENIDO', 'IDIOMADELCONT', 'CONTENTLANGUAGE', 'CONTENTLANG' ),
	'numberofadmins'          => array( '1', 'NÚMEROADMINIISTRADORES', 'NÚMEROADMINS', 'NUMEROADMINS', 'NUMEROADMINISTRADORES', 'NUMERODEADMINISTRADORES', 'NUMERODEADMINS', 'NÚMERODEADMINISTRADORES', 'NÚMERODEADMINS', 'NUMBEROFADMINS' ),
	'formatnum'               => array( '0', 'FORMATONÚMERO', 'FORMATONUMERO', 'FORMATNUM' ),
	'special'                 => array( '0', 'especial', 'special' ),
	'defaultsort'             => array( '1', 'ORDENAR:', 'CLAVEDEORDENPREDETERMINADO:', 'ORDENDECATEGORIAPREDETERMINADO:', 'ORDENDECATEGORÍAPREDETERMINADO:', 'DEFAULTSORT:', 'DEFAULTSORTKEY:', 'DEFAULTCATEGORYSORT:' ),
	'filepath'                => array( '0', 'RUTAARCHIVO:', 'RUTARCHIVO:', 'RUTADEARCHIVO:', 'FILEPATH:' ),
	'tag'                     => array( '0', 'etiqueta', 'ETIQUETA', 'tag' ),
	'hiddencat'               => array( '1', '__CATEGORÍAOCULTA__', '__HIDDENCAT__' ),
	'pagesincategory'         => array( '1', 'PÁGINASENCATEGORÍA', 'PÁGINASENCAT', 'PAGSENCAT', 'PAGINASENCATEGORIA', 'PAGINASENCAT', 'PAGESINCATEGORY', 'PAGESINCAT' ),
	'pagesize'                => array( '1', 'TAMAÑOPÁGINA', 'TAMAÑODEPÁGINA', 'TAMAÑOPAGINA', 'TAMAÑODEPAGINA', 'PAGESIZE' ),
	'index'                   => array( '1', '__INDEXAR__', '__INDEX__' ),
	'noindex'                 => array( '1', '__NOINDEXAR__', '__NOINDEX__' ),
	'numberingroup'           => array( '1', 'NÚMEROENGRUPO', 'NUMEROENGRUPO', 'NUMENGRUPO', 'NÚMENGRUPO', 'NUMBERINGROUP', 'NUMINGROUP' ),
	'staticredirect'          => array( '1', '__REDIRECCIONESTATICA__', '__REDIRECCIÓNESTÁTICA__', '__STATICREDIRECT__' ),
	'protectionlevel'         => array( '1', 'NIVELDEPROTECCIÓN', 'PROTECTIONLEVEL' ),
	'formatdate'              => array( '0', 'formatodefecha', 'formatearfecha', 'formatdate', 'dateformat' ),
);

$datePreferences = false;
$defaultDateFormat = 'dmy';
$dateFormats = array(
	'dmy time' => 'H:i',
	'dmy date' => 'j M Y',
	'dmy both' => 'H:i j M Y',
);

$separatorTransformTable = array( ',' => '.', '.' => ',' );
$linkTrail = '/^([a-záéíóúñ]+)(.*)$/sDu';
