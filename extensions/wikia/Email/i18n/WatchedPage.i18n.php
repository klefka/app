<?php
$messages = array();

$messages['en'] = array(
	'emailext-watchedpage-article-edited-subject' => '$1 on {{SITENAME}} has been edited by $2',
	'emailext-watchedpage-article-edited-subject-anonymous' => '$1 on {{SITENAME}} has been edited',
	'emailext-watchedpage-article-protected-subject' => '$1 on {{SITENAME}} has been protected by $2',
	'emailext-watchedpage-article-unprotected-subject' => '$1 on {{SITENAME}} has been unprotected by $2',
	'emailext-watchedpage-article-renamed-subject' => '$1 on {{SITENAME}} has been renamed by $2',
	'emailext-watchedpage-article-deleted-subject' => '$1 on {{SITENAME}} has been deleted by $2',
	'emailext-watchedpage-article-edited' => '[$1 $2] on [{{SERVERCANONICAL}} {{SITENAME}}] has been edited. Check it out!',
	'emailext-watchedpage-article-protected' => '[$1 $2] on [{{SERVERCANONICAL} {{SITENAME}}] has been protected. Check it out!',
	'emailext-watchedpage-article-unprotected' => '[$1 $2] on [{{SERVERCANONICAL} {{SITENAME}}] has been unprotected. Check it out!',
	'emailext-watchedpage-article-renamed' => '[$1 $2] on [{{SERVERCANONICAL} {{SITENAME}}] has been renamed. Check it out!',
	'emailext-watchedpage-article-deleted' => '[$1 $2] on [{{SERVERCANONICAL} {{SITENAME}}] has been deleted.',
	'emailext-watchedpage-no-summary' => 'No edit summary was given',
	'emailext-watchedpage-diff-button-text' => 'Go to page',
	'emailext-watchedpage-deleted-button-text' => 'See article history',
	'emailext-watchedpage-article-link-text' => "Head over to [$1 $2] to see what's new",
	'emailext-watchedpage-view-all-changes' => 'View all changes to [$1 $2]',
);

$messages['qqq'] = array(
	'emailext-watchedpage-article-edited-subject' => 'Subject line for watched article email when article was edited. $1 -> article name, $2 -> username of user who edited the article',
	'emailext-watchedpage-article-edited-subject-anonymous' => 'Subject line for watched article email edited by an anonymous user. $1 -> article name',
	'emailext-watchedpage-article-unprotected-subject' => 'Subject line for watched article email when article was unprotected. $1 -> article name, $2 -> username of user who edited the article',
	'emailext-watchedpage-article-renamed-subject' => 'Subject line for watched article email when article was renamed. $1 -> article name, $2 -> username of user who edited the article',
	'emailext-watchedpage-article-deleted-subject' => 'Subject line for watched article email when article was deleted. $1 -> article name, $2 -> username of user who edited the article',
	'emailext-watchedpage-article-edited' => 'Message to the user that an article they are following has been edited. $1 -> article url, $2 -> article title',
	'emailext-watchedpage-article-protected' => 'Message to the user that an article they are following has been protected. $1 -> article url, $2 -> article title',
	'emailext-watchedpage-article-unprotected' => 'Message to the user that an article they are following has been unprotected. $1 -> article url, $2 -> article title',
	'emailext-watchedpage-article-renamed' => 'Message to the user that an article they are following has been renamed. $1 -> article url, $2 -> article title',
	'emailext-watchedpage-article-deleted' => 'Message to the user that an article they are following has been deleted. $1 -> article url, $2 -> article title',
	'emailext-watchedpage-no-summary' => 'Message shown when the editor did not leave an edit summary',
	'emailext-watchedpage-diff-button-text' => 'Text for button that, when clicked, navigates to the diff page referencing this change.',
	'emailext-watchedpage-deleted-button-text' => 'Text for button that, when clicked, navigates to the deleted page.',
	'emailext-watchedpage-article-link-text' => 'Call to action to visit the article page. $1 -> article url, $2 -> article title.',
	'emailext-watchedpage-view-all-changes' => 'Call to action to visit history of the article page. $1 -> article history url, $2 -> article title',
);

$messages['de'] = array(
	'emailext-watchedpage-article-edited-subject' => '{{SITENAME}}: Der Artikel „$1“ wurde von $2 bearbeitet',
	'emailext-watchedpage-article-edited-subject-anonymous' => '$1 wurde auf {{SITENAME}} bearbeitet',
	'emailext-watchedpage-article-edited' => '[$1 $2] auf [{{SERVERCANONICAL} {{SITENAME}}] wurde bearbeitet. Sieh es dir an!',
	'emailext-watchedpage-diff-button-text' => 'Zurück zur Seite',
	'emailext-watchedpage-article-link-text' => 'Unter [$1 $2] siehst du, was es Neues gibt',
	'emailext-watchedpage-view-all-changes' => 'Alle Änderungen an [$1 $2] ansehen',
	'emailext-watchedpage-no-summary' => 'Es wurde keine Zusammenfassung der Bearbeitung angegeben.',
	'emailext-watchedpage-article-protected-subject' => '{{SITENAME}}: Der Artikel „$1“ wurde von $2 geschützt',
	'emailext-watchedpage-article-unprotected-subject' => '{{SITENAME}}: $2 hat den Schutz vom Artikel „$1“ entfernt',
	'emailext-watchedpage-article-renamed-subject' => '{{SITENAME}}: Der Artikel „$1“ wurde von $2 umbenannt',
	'emailext-watchedpage-article-deleted-subject' => '{{SITENAME}}: Der Artikel „$1“ wurde von $2 gelöscht',
	'emailext-watchedpage-article-protected' => '[$1 $2] auf [{{SERVERCANONICAL} {{SITENAME}}] wurde geschützt. Sieh es dir an!',
	'emailext-watchedpage-article-unprotected' => 'Von [$1 $2] auf [{{SERVERCANONICAL} {{SITENAME}}] wurde der Schutz entfernt. Sieh es dir an!',
	'emailext-watchedpage-article-renamed' => '[$1 $2] auf [{{SERVERCANONICAL} {{SITENAME}}] wurde umbenannt. Sieh es dir an!',
	'emailext-watchedpage-article-deleted' => '[$1 $2] auf [{{SERVERCANONICAL} {{SITENAME}}] wurde gelöscht.',
	'emailext-watchedpage-deleted-button-text' => 'Versionsgeschichte ansehen',
	'emailext-watchedpage-salutation' => 'Hallo $1,',
);

$messages['es'] = array(
	'emailext-watchedpage-article-edited-subject' => '$1 en {{SITENAME}} ha sido editado por $2',
	'emailext-watchedpage-article-edited-subject-anonymous' => 'La página $1 en {{SITENAME}} ha sido editada',
	'emailext-watchedpage-article-edited' => '[$1 $2] en [{{SERVERCANONICAL} {{SITENAME}}] ha sido editado. ¡Revísalo!',
	'emailext-watchedpage-diff-button-text' => 'Ir a la página',
	'emailext-watchedpage-article-link-text' => 'Visita la página [$1 $2] para ver qué hay de nuevo.',
	'emailext-watchedpage-view-all-changes' => 'Ver todos los cambios realizados en [$1 $2].',
	'emailext-watchedpage-no-summary' => 'Resumen de ediciones no fue entregado',
	'emailext-watchedpage-article-protected-subject' => '$1 en {{SITENAME}} ha sido protegido por $2',
	'emailext-watchedpage-article-unprotected-subject' => '$1 en {{SITENAME}} ha sido desprotegido por $2',
	'emailext-watchedpage-article-renamed-subject' => '$1 en {{SITENAME}} ha sido renombrado por $2',
	'emailext-watchedpage-article-deleted-subject' => '$1 en {{SITENAME}} ha sido borrado por $2',
	'emailext-watchedpage-article-protected' => '[$1 $2] en [{{SERVERCANONICAL} {{SITENAME}}] ha sido protegido. ¡Revísalo!',
	'emailext-watchedpage-article-unprotected' => '[$1 $2] en [{{SERVERCANONICAL} {{SITENAME}}] ha sido desprotegido. ¡Revísalo!',
	'emailext-watchedpage-article-renamed' => '[$1 $2] en [{{SERVERCANONICAL} {{SITENAME}}] ha sido renombrado ¡Revísalo!',
	'emailext-watchedpage-article-deleted' => '[$1 $2] en [{{SERVERCANONICAL} {{SITENAME}}] ha sido borrado.',
	'emailext-watchedpage-deleted-button-text' => 'Ver el historial del artículo',
	'emailext-watchedpage-salutation' => 'Hola, $1;',
);

$messages['fr'] = array(
	'emailext-watchedpage-article-edited-subject' => '$2 a modifié $1 sur {{SITENAME}}',
	'emailext-watchedpage-article-edited-subject-anonymous' => "Quelqu'un a modifié $1 sur {{SITENAME}}.",
	'emailext-watchedpage-article-edited' => "Quelqu'un a modifié [$1 $2] sur [{{SERVERCANONICAL} {{SITENAME}}]. Consultez les modifications !",
	'emailext-watchedpage-diff-button-text' => 'Aller à la page',
	'emailext-watchedpage-article-link-text' => 'Rendez-vous sur [$1 $2] pour voir ce qui a été modifié',
	'emailext-watchedpage-view-all-changes' => 'Affichez toutes les modifications apportées à [$1 $2]',
	'emailext-watchedpage-no-summary' => "Aucun résumé des modifications n'a été fourni.",
	'emailext-watchedpage-article-protected-subject' => '$2 a protégé $1 sur {{SITENAME}}',
	'emailext-watchedpage-article-unprotected-subject' => '$2 a déprotégé $1 sur {{SITENAME}}',
	'emailext-watchedpage-article-renamed-subject' => '$2 a renommé $1 sur {{SITENAME}}',
	'emailext-watchedpage-article-deleted-subject' => '$2 a supprimé $1 sur {{SITENAME}}',
	'emailext-watchedpage-article-protected' => "Quelqu'un a protégé [$1 $2] sur [{{SERVERCANONICAL} {{SITENAME}}]. Consultez l'article !",
	'emailext-watchedpage-article-unprotected' => "Quelqu'un a déprotégé [$1 $2] sur [{{SERVERCANONICAL} {{SITENAME}}]. Consultez l'article !",
	'emailext-watchedpage-article-renamed' => "Quelqu'un a renommé [$1 $2] sur [{{SERVERCANONICAL} {{SITENAME}}]. Consultez l'article !",
	'emailext-watchedpage-article-deleted' => "Quelqu'un a supprimé [$1 $2] sur [{{SERVERCANONICAL} {{SITENAME}}].",
	'emailext-watchedpage-deleted-button-text' => "Voir l'historique",
	'emailext-watchedpage-salutation' => 'Bonjour $1,',
);

$messages['it'] = array(
	'emailext-watchedpage-article-edited-subject' => '$2 ha modificato $1 nella {{SITENAME}}',
	'emailext-watchedpage-article-edited-subject-anonymous' => '$1 di {{SITENAME}} è stato modificato',
	'emailext-watchedpage-article-edited' => "Qualcuno ha modificato [$1 $2] nella [{{SERVERCANONICAL} {{SITENAME}}]. Dacci un'occhiata!",
	'emailext-watchedpage-diff-button-text' => 'Vai alla pagina',
	'emailext-watchedpage-article-link-text' => "Clicca su [$1 $2] per vedere cosa c'è di nuovo",
	'emailext-watchedpage-view-all-changes' => 'Vedi tutte le modifiche a [$1 $2]',
	'emailext-watchedpage-no-summary' => 'Non è stato fornito un riassunto delle modifiche',
	'emailext-watchedpage-article-protected-subject' => '$2 ha protetto $1 nella {{SITENAME}}',
	'emailext-watchedpage-article-unprotected-subject' => '$2 ha tolto la protezione a $1 nella {{SITENAME}}',
	'emailext-watchedpage-article-renamed-subject' => '$2 ha cambiato titolo a $1 nella {{SITENAME}}',
	'emailext-watchedpage-article-deleted-subject' => '$2 ha eliminato $1 nella {{SITENAME}}',
	'emailext-watchedpage-article-protected' => "Qualcuno ha protetto [$1 $2] nella [{{SERVERCANONICAL} {{SITENAME}}]. Dacci un'occhiata!",
	'emailext-watchedpage-article-unprotected' => "Qualcuno ha tolto la protezione a [$1 $2] nella [{{SERVERCANONICAL} {{SITENAME}}]. Dacci un'occhiata!",
	'emailext-watchedpage-article-renamed' => "Qualcuno ha cambiato titolo a [$1 $2] nella [{{SERVERCANONICAL} {{SITENAME}}]. Dacci un'occhiata!",
	'emailext-watchedpage-article-deleted' => 'Qualcuno ha eliminato [$1 $2] nella [{{SERVERCANONICAL} {{SITENAME}}].',
	'emailext-watchedpage-deleted-button-text' => "Vedi la cronologia dell'articolo",
	'emailext-watchedpage-salutation' => 'Ciao, $1.',
);

$messages['ja'] = array(
	'emailext-watchedpage-article-edited-subject' => '$2さんが{{SITENAME}}の$1に編集を加えたようです',
	'emailext-watchedpage-article-edited-subject-anonymous' => '{{SITENAME}}の「$1」に編集が加えられました',
	'emailext-watchedpage-article-edited' => '[{{SERVERCANONICAL} {{SITENAME}}]の[$1 $2]に編集が加えられたようです。最新の記事をチェックしてみましょう！',
	'emailext-watchedpage-diff-button-text' => 'ページに移動',
	'emailext-watchedpage-article-link-text' => '[$1 $2]にアクセスして最新の内容を確認する',
	'emailext-watchedpage-view-all-changes' => '[$1 $2]で行われたすべての変更を見る',
	'emailext-watchedpage-no-summary' => '編集の要約はありません。',
	'emailext-watchedpage-article-protected-subject' => '$2さんが{{SITENAME}}の$1を保護したようです',
	'emailext-watchedpage-article-unprotected-subject' => '$2さんが{{SITENAME}}の$1の保護を解除したようです',
	'emailext-watchedpage-article-renamed-subject' => '$2さんが{{SITENAME}}の$1の名前を変更したようです',
	'emailext-watchedpage-article-deleted-subject' => '$2さんが{{SITENAME}}の$1を削除したようです',
	'emailext-watchedpage-article-protected' => '[{{SERVERCANONICAL} {{SITENAME}}]の[$1 $2]が保護されたようです。チェックしてみましょう！',
	'emailext-watchedpage-article-unprotected' => '[{{SERVERCANONICAL} {{SITENAME}}]の[$1 $2]の保護が解除されたようです。チェックしてみましょう！',
	'emailext-watchedpage-article-renamed' => '[{{SERVERCANONICAL} {{SITENAME}}]の[$1 $2]の名前が変更されたようです。チェックしてみましょう！',
	'emailext-watchedpage-article-deleted' => '[{{SERVERCANONICAL} {{SITENAME}}]の[$1 $2]が削除されたようです。',
	'emailext-watchedpage-deleted-button-text' => '記事の履歴を見る',
	'emailext-watchedpage-salutation' => '$1さん',
);

$messages['ko'] = array(
	'emailext-watchedpage-diff-button-text' => '이전 판과 비교',
	'emailext-watchedpage-article-deleted-subject' => '$2 님이 {{SITENAME}}의 $1 문서를 삭제했습니다',
	'emailext-watchedpage-article-deleted' => "'''[{{SERVERCANONICAL} {{SITENAME}}]의 [$1 $2] 문서가 삭제되었습니다.'''",
	'emailext-watchedpage-article-edited-subject-anonymous' => '{{SITENAME}}의 $1 문서가 편집되었습니다',
	'emailext-watchedpage-article-edited-subject' => '$2 님이 {{SITENAME}}의 $1 문서를 편집했습니다',
	'emailext-watchedpage-article-edited' => "'''[{{SERVERCANONICAL} {{SITENAME}}]의 [$1 $2] 문서에 편집이 있었습니다. 직접 가서 확인해 보시는 건 어떨까요?'''",
	'emailext-watchedpage-article-link-text' => "[$1 '''$2''' 문서의 가장 최근 판과 비교하기]",
	'emailext-watchedpage-article-protected-subject' => '$2 님이 {{SITENAME}}의 $1 문서를 보호했습니다',
	'emailext-watchedpage-article-protected' => "'''[{{SERVERCANONICAL} {{SITENAME}}]의 [$1 $2] 문서가 보호되었습니다. 직접 가서 확인해 보시는 건 어떨까요?'''",
	'emailext-watchedpage-article-renamed-subject' => '$2 님이 {{SITENAME}}의 $1 문서를 보호했습니다',
	'emailext-watchedpage-article-renamed' => "'''[{{SERVERCANONICAL} {{SITENAME}}]의 [$1 $2] 문서가 이동되었습니다. 직접 가서 확인해 보시는 건 어떨까요?'''",
	'emailext-watchedpage-article-unprotected-subject' => '$2 님이 {{SITENAME}}의 $1 문서를 보호 해제했습니다',
	'emailext-watchedpage-article-unprotected' => "'''[{{SERVERCANONICAL} {{SITENAME}}]의 [$1 $2] 문서가 보호 해제되었습니다. 직접 가서 확인해 보시는 건 어떨까요?'''",
	'emailext-watchedpage-deleted-button-text' => '문서 역사 보기',
	'emailext-watchedpage-no-summary' => '편집 요약이 없습니다',
	'emailext-watchedpage-view-all-changes' => "[$1 '''$2''' 문서의 역사 보기]",
);

$messages['nl'] = array(
	'emailext-watchedpage-article-edited-subject' => '$1 op {{SITENAME}} is bewerkt door $2',
	'emailext-watchedpage-article-edited-subject-anonymous' => '$1 on {{SITENAME}} has been edited',
	'emailext-watchedpage-article-edited' => '[$1 $2] on [{{SERVERCANONICAL} {{SITENAME}}] has been edited. Check it out!',
	'emailext-watchedpage-diff-button-text' => 'Compare changes',
	'emailext-watchedpage-article-link-text' => "Head over to [$1 $2] to see what's new",
	'emailext-watchedpage-view-all-changes' => 'View all changes to [$1 $2]',
	'emailext-watchedpage-no-summary' => 'Er werd geen bewerkingssamenvatting opgegeven',
	'emailext-watchedpage-article-protected-subject' => '$1 on {{SITENAME}} has been protected by $2',
	'emailext-watchedpage-article-unprotected-subject' => '$2 heeft de beveiliging van $1 op {{SITENAME}} opgeheven',
	'emailext-watchedpage-article-renamed-subject' => '$1 op {{SITENAME}} is hernoemd door $2',
	'emailext-watchedpage-article-deleted-subject' => '$1 op {{SITENAME}} is door $2 verwijderd',
	'emailext-watchedpage-article-protected' => '[$1 $2] on [{{SERVERCANONICAL} {{SITENAME}}] has been protected. Check it out!',
	'emailext-watchedpage-article-unprotected' => '[$1 $2] on [{{SERVERCANONICAL} {{SITENAME}}] has been unprotected. Check it out!',
	'emailext-watchedpage-article-renamed' => '[$1 $2] on [{{SERVERCANONICAL} {{SITENAME}}] has been renamed. Check it out!',
	'emailext-watchedpage-article-deleted' => '[$1 $2] on [{{SERVERCANONICAL} {{SITENAME}}] has been deleted.',
	'emailext-watchedpage-deleted-button-text' => 'Artikelgeschiedenis bekijken',
	'emailext-watchedpage-salutation' => 'Hi $1,',
);

$messages['pl'] = array(
	'emailext-watchedpage-article-edited-subject' => 'Użytkownik $2 dokonał edycji $1 na {{SITENAME}}',
	'emailext-watchedpage-article-edited-subject-anonymous' => 'Dokonano edycji $1 na {{SITENAME}}',
	'emailext-watchedpage-article-edited' => 'Dokonano edycji [$1 $2] na [{{SERVERCANONICAL} {{SITENAME}}]. Sprawdź!',
	'emailext-watchedpage-diff-button-text' => 'Idź do strony',
	'emailext-watchedpage-article-link-text' => 'Przejdź do [$1 $2] i zobacz co się zmieniło',
	'emailext-watchedpage-view-all-changes' => 'Zobacz wszystkie zmiany [$1 $2]',
	'emailext-watchedpage-no-summary' => 'Brak podsumowania zmian',
	'emailext-watchedpage-article-protected-subject' => '{{GENDER:$2|$2 zabezpieczył|$2 zabezpieczyła|Użytkownik $2 zabezpieczył}} $1 na {{SITENAME}}',
	'emailext-watchedpage-article-unprotected-subject' => 'Użytkownik $2 usunął zabezpieczenie $1 na {{SITENAME}}',
	'emailext-watchedpage-article-renamed-subject' => 'Użytkownik $2 zmienił nazwę $1 na {{SITENAME}}',
	'emailext-watchedpage-article-deleted-subject' => 'Użytkownik $2 usunął $1 na {{SITENAME}}',
	'emailext-watchedpage-article-protected' => 'Zabezpieczono [$1 $2] na [{{SERVERCANONICAL} {{SITENAME}}]. Sprawdź!',
	'emailext-watchedpage-article-unprotected' => 'Usunięto zabezpieczenie [$1 $2] na [{{SERVERCANONICAL} {{SITENAME}}]. Sprawdź!',
	'emailext-watchedpage-article-renamed' => 'Dokonano zmiany nazwy [$1 $2] na [{{SERVERCANONICAL} {{SITENAME}}]. Sprawdź!',
	'emailext-watchedpage-article-deleted' => 'Usunięto [$1 $2] na [{{SERVERCANONICAL} {{SITENAME}}]. Sprawdź!',
	'emailext-watchedpage-deleted-button-text' => 'Zobacz historię artykułu',
	'emailext-watchedpage-salutation' => 'Cześć $1,',
);

$messages['pt'] = array(
	'emailext-watchedpage-article-edited-subject' => '$1 foi editado por $2 na {{SITENAME}}',
	'emailext-watchedpage-article-edited-subject-anonymous' => '$1 na {{SITENAME}} foi editado',
	'emailext-watchedpage-article-edited' => '[$1 $2] em [{{SERVERCANONICAL} {{SITENAME}}] foi editado. Confira!',
	'emailext-watchedpage-diff-button-text' => 'Ir para página',
	'emailext-watchedpage-article-link-text' => 'Vá para [$1 $2] para ver o que há de novo',
	'emailext-watchedpage-view-all-changes' => 'Visualizar todas as alterações de [$1 $2]',
	'emailext-watchedpage-no-summary' => 'Não foi dado nenhum resumo',
	'emailext-watchedpage-article-protected-subject' => '$1 foi protegido por $2 na {{SITENAME}}',
	'emailext-watchedpage-article-unprotected-subject' => '$1 foi desprotegido por $2 na {{SITENAME}}',
	'emailext-watchedpage-article-renamed-subject' => '$1 foi renomeado por $2 na {{SITENAME}}',
	'emailext-watchedpage-article-deleted-subject' => '$1 foi excluído por $2 na {{SITENAME}}',
	'emailext-watchedpage-article-protected' => '[$1 $2] na [{{SERVERCANONICAL} {{SITENAME}}] foi protegido. Confira!',
	'emailext-watchedpage-article-unprotected' => '[$1 $2] na [{{SERVERCANONICAL} {{SITENAME}}] foi desprotegido. Confira!',
	'emailext-watchedpage-article-renamed' => '[$1 $2] na [{{SERVERCANONICAL} {{SITENAME}}] foi renomeado. Confira!',
	'emailext-watchedpage-article-deleted' => '[$1 $2] na [{{SERVERCANONICAL} {{SITENAME}}] foi excluído.',
	'emailext-watchedpage-deleted-button-text' => 'Ver o histórico do artigo',
	'emailext-watchedpage-salutation' => 'Olá $1,',
);

$messages['ru'] = array(
	'emailext-watchedpage-article-edited-subject' => '$2 отредактировал(а) страницу $1 на {{SITENAME}}',
	'emailext-watchedpage-article-edited-subject-anonymous' => 'Страница «$1» на {{SITENAME}} была отредактирована',
	'emailext-watchedpage-article-edited' => 'Страница [$1 $2] на [{{SERVERCANONICAL} {{SITENAME}}] была отредактирована.',
	'emailext-watchedpage-diff-button-text' => 'Перейти на страницу',
	'emailext-watchedpage-article-link-text' => "[$1 Для просмотра самой страницы перейдите к «'''$2'''».]",
	'emailext-watchedpage-view-all-changes' => "[$1 Посмотрите все правки страницы «'''$2'''».]",
	'emailext-watchedpage-no-summary' => 'Участник не добавил описание этой правке.',
	'emailext-watchedpage-article-protected-subject' => '$2 защитил(а) страницу $1 на {{SITENAME}}',
	'emailext-watchedpage-article-unprotected-subject' => '$2 снял(а) защиту со страницы $1 на {{SITENAME}}',
	'emailext-watchedpage-article-renamed-subject' => '$2 переименовал(а) страницу $1 на {{SITENAME}}',
	'emailext-watchedpage-article-deleted-subject' => '$2 удалил(а) страницу $1 на {{SITENAME}}',
	'emailext-watchedpage-article-protected' => 'Страница [$1 $2] на [{{SERVERCANONICAL} {{SITENAME}}] была защищена.',
	'emailext-watchedpage-article-unprotected' => 'Со страницы [$1 $2] на [{{SERVERCANONICAL} {{SITENAME}}] была снята защита.',
	'emailext-watchedpage-article-renamed' => 'Страница [$1 $2] на [{{SERVERCANONICAL} {{SITENAME}}] была переименована.',
	'emailext-watchedpage-article-deleted' => 'Страница [$1 $2] на [{{SERVERCANONICAL} {{SITENAME}}] была удалена.',
	'emailext-watchedpage-deleted-button-text' => 'Просмотреть историю страницы',
	'emailext-watchedpage-salutation' => 'Здравствуйте, $1!',
);

$messages['zh-hans'] = array(
	'emailext-watchedpage-article-edited-subject' => '{{SITENAME}}上题为$1的文章已被$2編輯',
	'emailext-watchedpage-article-edited-subject-anonymous' => '{{SITENAME}}上的$1 已被编辑',
	'emailext-watchedpage-article-edited' => '[{{SERVERCANONICAL} {{SITENAME}}]上题为[$1 $2]的文章已被编辑。快来查看吧！',
	'emailext-watchedpage-diff-button-text' => '转至页面',
	'emailext-watchedpage-article-link-text' => '前往[$1 $2]查看新内容',
	'emailext-watchedpage-view-all-changes' => '查看对[$1 $2]所做的所有更改',
	'emailext-watchedpage-no-summary' => '没有编辑概要',
	'emailext-watchedpage-article-protected-subject' => '{{SITENAME}}上标题为$1的文章已被$2保护',
	'emailext-watchedpage-article-unprotected-subject' => '{{SITENAME}}上题为$1的文章已被$2取消保护',
	'emailext-watchedpage-article-renamed-subject' => '{{SITENAME}}上题为$1的文章已被$2重命名',
	'emailext-watchedpage-article-deleted-subject' => '{{SITENAME}}上题为$1的文章已被$2删除',
	'emailext-watchedpage-article-protected' => '[{{SERVERCANONICAL} {{SITENAME}}]上题为[$1 $2]的文章已被保护。快来查看吧！',
	'emailext-watchedpage-article-unprotected' => '[{{SERVERCANONICAL} {{SITENAME}}]上题为[$1 $2]的文章已被取消保护。快来查看吧！',
	'emailext-watchedpage-article-renamed' => '[{{SERVERCANONICAL} {{SITENAME}}]上题为[$1 $2]的文章已被重新命名。快来查看吧！',
	'emailext-watchedpage-article-deleted' => '[{{SERVERCANONICAL} {{SITENAME}}]上题为[$1 $2]的文章已被删除。',
	'emailext-watchedpage-deleted-button-text' => '查看文章历史记录',
	'emailext-watchedpage-salutation' => '$1，您好！',
);

$messages['zh-hant'] = array(
	'emailext-watchedpage-article-edited-subject' => '{{SITENAME}}上題為$1的文章已被$2編輯',
	'emailext-watchedpage-article-protected-subject' => '{{SITENAME}}上題爲$1的文章已被$2保護',
	'emailext-watchedpage-article-unprotected-subject' => '{{SITENAME}}上題爲$1的文章已被$2取消保護',
	'emailext-watchedpage-article-renamed-subject' => '{{SITENAME}}網站上題爲$1的文章已被$2重新命名',
	'emailext-watchedpage-article-deleted-subject' => '{{SITENAME}}上題爲$1的文章已被$2刪除',
	'emailext-watchedpage-salutation' => '$1，您好！',
	'emailext-watchedpage-article-edited' => "'''[{{SERVERCANONICAL} {{SITENAME}}]上題為[$1 $2]的文章已被編輯。快來查看吧！'''",
	'emailext-watchedpage-article-protected' => "'''[{{SERVERCANONICAL} {{SITENAME}}]上題爲[$1 $2]的文章已被保護。快來查看吧！'''",
	'emailext-watchedpage-article-unprotected' => "'''[{{SERVERCANONICAL} {{SITENAME}}]上題爲[$1 $2]的文章已被取消保護。快來查看吧！'''",
	'emailext-watchedpage-article-renamed' => "'''[{{SERVERCANONICAL} {{SITENAME}}]上題爲[$1 $2]的文章已被重新命名。快來查看吧！'''",
	'emailext-watchedpage-article-deleted' => "'''[{{SERVERCANONICAL} {{SITENAME}}]上題爲[$1 $2]的文章已被刪除。'''",
	'emailext-watchedpage-no-summary' => '沒有編輯摘要',
	'emailext-watchedpage-diff-button-text' => '轉到頁面',
	'emailext-watchedpage-deleted-button-text' => '查看文章歷史記錄',
	'emailext-watchedpage-article-link-text' => "[$1 前往'''$2'''查看新內容]",
	'emailext-watchedpage-view-all-changes' => "[$1 查看對'''$2'''所做的所有更改]",
	'emailext-watchedpage-article-edited-subject-anonymous' => '{{SITENAME}}上的$1 已被編輯',
);

