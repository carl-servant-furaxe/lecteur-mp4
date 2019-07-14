# Lecteur MP4 avec suivi Google Analytics
La configuration du  lecteur se fait seulement dans la partie de code PHP en haut.

**Ne rien modifier en bas de la partie configuration**

## Code Google Analytics
Mettre le code de tracking Google Analytics sous cette variable "$ga".
```
$ga = 'UA-130445059-XX';
```

## Valeurs par default
Au debut du code, ces valeurs sont celles utilisees par defaut si le lecteur ne trouve pas la video desiree.

```
$video_image = '';
$video_title = '';
$video_urls = array(
	'large' => '',
	'desktop' => '',
	'tablet' => '',
	'mobile' => '',
);;
$cta_image = '';
$cta_title = '';
$cta_url = '';
```

### Code destinee a la video
| Variable      | Description |
| :------------ | :---------- |
| $video_image  | URL de l'image "poster" qui s'affiche si la video n'est pas en lecteur |
| $video_title  | Nom de la video qui sera utilisee pour identifier dans Google Analytics |
| $video_urls   | URL vers les videos au format MP4, dans les differents bitrates |

### Code destinee au "call-to-action" a la fin de la video
Si vous ajoutez des valeurs a ces variables, une image de prise d'action sera affichee par dessus la video a la fin de la lecture.

| Variable      | Description |
| :------------ | :---------- |
| $cta_image    | URL de l'image cliquable |
| $cta_title    | Nom du CTA qui sera utilise pour identifier dans Google Analytics |
| $cta_url      | URL de destination lors du clique |


## Valeurs pour chacune des videos
Une video est definie via la valeur "v=" dans un url.

```
ex. https://ici.radio-canada.ca/nom-du-mandat/mp4.php?v=code-de-la-video
```

C'est dans la partie PHP definie par la "switch" que le code determine quelle video afficher.
Ici, c'est "code-de-la-video" qui serait trouvee par le systeme.

Les variables definie entre "case 'code-de-la-video'" et "break" vont ecraser les valeurs par defaut vu plus tot.

Ajouter autant de video que vous voulez en  utilisant le code suivant a l'interieur de la "switch".

```
	case 'code-de-la-video':
		$video_image = 'data/traffic-club-cafe.jpg';
		$video_title = 'Traffic Club Cafe';
		$video_urls = array(
			'large' => 'https://medias-pub.radio-canada.ca/Y_NISSAN_DODD-Cafe_Trafic_2_min_colo_mix_2000.mp4',
			'desktop' => 'https://medias-pub.radio-canada.ca/Y_NISSAN_DODD-Cafe_Trafic_2_min_colo_mix_800.mp4',
			'tablet' => 'https://medias-pub.radio-canada.ca/Y_NISSAN_DODD-Cafe_Trafic_2_min_colo_mix_800.mp4',
			'mobile' => 'https://medias-pub.radio-canada.ca/Y_NISSAN_DODD-Cafe_Trafic_2_min_colo_mix_400.mp4',
		);
	break;
```


Il est tres important de ne pas avoir 2 valeurs identiques dans le "case".
Sinon, la 2e sera prise en compte.


## URLS des videos selon Radio-Canada
L'equipe qui s'occupe de convertir les videos en utilisant "la moulinette" (convertisseur video maison de Radio-Canada),
vous fournira plusieurs urls (entre 5 et 10). Ceux a utiliser sont les suivant:

| Format   | URL preference |
| :-----   | :------------- |
| large    | _2000.mp4 |
| desktop  | _800.mp4 |
| tablet   | _800.mp4 |
| mobile   | _400.mp4 |
