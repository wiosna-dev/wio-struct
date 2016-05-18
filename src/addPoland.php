<?php
namespace WioStruct;

use \WioStruct\Core\StructDefinition as StructDefinition;

require_once('exampleEnvironment.php');

echo '<!doctype HTML><html><head><meta charset="utf-8"></head><body>';


$map =
[
    'dolnośląskie'=>
    [
        'powiat_grodzki'=>
        [
            'Wrocław',
            'Jelenia Góra',
            'Legnica',
            'Wałbrzych'
        ],
        'powiat_ziemski'=>
        [
            'bolesławiecki' => 'Bolesławiec',
            'dzierżoniowski' => 'Dzierżoniów',
            'głogowski' => 'Głogów',
            'górowski' => 'Góra',
            'jaworski' => 'Jawor',
            'jeleniogórski' => 'Jelenia Góra',
            'kamiennogórski' => 'Kamienna Góra',
            'kłodzki' => 'Kłodzko',
            'legnicki' => 'Legnica',
            'lubański' => 'Lubań',
            'lubiński' => 'Lubin',
            'lwówecki' => 'Lwówek Śląski',
            'milicki' => 'Milicz',
            'oleśnicki' => 'Oleśnica',
            'oławski' => 'Oława',
            'polkowicki' => 'Polkowice',
            'strzeliński' => 'Strzelin',
            'średzki' => 'Środa Śląska',
            'świdnicki' => 'Świdnica',
            'trzebnicki' => 'Trzebnica',
            'wałbrzyski' => 'Wałbrzych',
            'wołowski' => 'Wołów',
            'wrocławski' => 'Wrocław',
            'ząbkowicki' => 'Ząbkowice Śląskie',
            'zgorzelecki' => 'Zgorzelec',
            'złotoryjski' => 'Złotoryja'
        ]
    ],
    'kujawsko-pomorskie'=>
    [
        'powiat_grodzki'=>
        [
            'Bydgoszcz',
            'Toruń',
            'Włocławek',
            'Grudziądz'
        ],
        'powiat_ziemski'=>
        [
            'aleksandrowski' => 'Aleksandrów Kujawski',
            'brodnicki' => 'Brodnica',
            'bydgoski' => 'Bydgoszcz',
            'chełmiński' => 'Chełmno',
            'golubsko-dobrzyński' => 'Golub-Dobrzyń',
            'grudziądzki' => 'Grudziądz',
            'inowrocławski' => 'Inowrocław',
            'lipnowski' => 'Lipno',
            'mogileński' => 'Mogilno',
            'nakielski' => 'Nakło nad Notecią',
            'radziejowski' => 'Radziejów',
            'rypiński' => 'Rypin',
            'sępoleński' => 'Sępólno Krajeńskie',
            'świecki' => 'Świecie',
            'toruński' => 'Toruń',
            'tucholski' => 'Tuchola',
            'wąbrzeski' => 'Wąbrzeźno',
            'włocławski' => 'Włocławek',
            'żniński' => 'Żnin'
        ]
    ],
    'lubelskie'=>
    [
        'powiat_grodzki'=>
        [
            'Lublin',
            'Biała Podlaska',
            'Chełm',
            'Zamość'
        ],
        'powiat_ziemski'=>
        [
            'bialski' => 'Biała Podlaska',
            'biłgorajski' => 'Biłgoraj',
            'chełmski' => 'Chełm',
            'hrubieszowski' => 'Hrubieszów',
            'janowski' => 'Janów Lubelski',
            'krasnostawski' => 'Krasnystaw',
            'kraśnicki' => 'Kraśnik',
            'lubartowski' => 'Lubartów',
            'lubelski' => 'Lublin',
            'łęczyński' => 'Łęczna',
            'łukowski' => 'Łuków',
            'opolski' => 'Opole Lubelskie',
            'parczewski' => 'Parczew',
            'puławski' => 'Puławy',
            'radzyński' => 'Radzyń Podlaski',
            'rycki' => 'Ryki',
            'świdnicki' => 'Świdnik',
            'tomaszowski' => 'Tomaszów Lubelski',
            'włodawski' => 'Włodawa',
            'zamojski' => 'Zamość'
        ]
    ],
    'lubuskie'=>
    [
        'powiat_grodzki'=>
        [
            'Gorzów Wielkopolski',
            'Zielona Góra'
        ],
        'powiat_ziemski'=>
        [
            'gorzowski' => 'Gorzów Wielkopolski',
            'krośnieński' => 'Krosno Odrzańskie',
            'międzyrzecki' => 'Międzyrzecz',
            'nowosolski' => 'Nowa Sól',
            'słubicki' => 'Słubice',
            'strzelecko-drezdenecki' => 'Strzelce Krajeńskie',
            'sulęciński' => 'Sulęcin',
            'świebodziński' => 'Świebodzin',
            'wschowski' => 'Wschowa',
            'zielonogórski' => 'Zielona Góra',
            'żagański' => 'Żagań',
            'żarski' => 'Żary'
        ]
    ],
    'łódzkie'=>
    [
        'powiat_grodzki'=>
        [
            'Łódź',
            'Piotrków Trybunalski',
            'Skierniewice'
        ],
        'powiat_ziemski'=>
        [
            'bełchatowski' => 'Bełchatów',
            'brzeziński' => 'Brzeziny',
            'kutnowski' => 'Kutno',
            'łaski' => 'Łask',
            'łęczycki' => 'Łęczyca',
            'łowicki' => 'Łowicz',
            'łódzki wschodni' => 'Łódź',
            'opoczyński' => 'Opoczno',
            'pabianicki' => 'Pabianice',
            'pajęczański' => 'Pajęczno',
            'piotrkowski' => 'Piotrków Trybunalski',
            'poddębicki' => 'Poddębice',
            'radomszczański' => 'Radomsko',
            'rawski' => 'Rawa Mazowiecka',
            'sieradzki' => 'Sieradz',
            'skierniewicki' => 'Skierniewice',
            'tomaszowski' => 'Tomaszów Mazowiecki',
            'wieluński' => 'Wieluń',
            'wieruszowski' => 'Wieruszów',
            'zduńskowolski' => 'Zduńska Wola',
            'zgierski' => 'Zgierz'
        ]
    ],
    'małopolskie'=>
    [
        'powiat_grodzki'=>
        [
            'Kraków',
            'Nowy Sącz',
            'Tarnów'
        ],
        'powiat_ziemski'=>
        [
            'bocheński' => 'Bochnia',
            'brzeski' => 'Brzesko',
            'chrzanowski' => 'Chrzanów',
            'dąbrowski' => 'Dąbrowa Tarnowska',
            'gorlicki' => 'Gorlice',
            'krakowski' => 'Kraków',
            'limanowski' => 'Limanowa',
            'miechowski' => 'Miechów',
            'myślenicki' => 'Myślenice',
            'nowosądecki' => 'Nowy Sącz',
            'nowotarski' => 'Nowy Targ',
            'olkuski' => 'Olkusz',
            'oświęcimski' => 'Oświęcim',
            'proszowicki' => 'Proszowice',
            'suski' => 'Sucha Beskidzka',
            'tarnowski' => 'Tarnów',
            'tatrzański' => 'Zakopane',
            'wadowicki' => 'Wadowice',
            'wielicki' => 'Wieliczka'
        ]
    ],
    'mazowieckie'=>
    [
        'powiat_grodzki'=>
        [
            'Warszawa',
            'Ostrołęka',
            'Płock',
            'Radom',
            'Siedlce'
        ],
        'powiat_ziemski'=>
        [
            'białobrzeski' => 'Białobrzegi',
            'ciechanowski' => 'Ciechanów',
            'garwoliński' => 'Garwolin',
            'gostyniński' => 'Gostynin',
            'grodziski' => 'Grodzisk Mazowiecki',
            'grójecki' => 'Grójec',
            'kozienicki' => 'Kozienice',
            'legionowski' => 'Legionowo',
            'lipski' => 'Lipsko',
            'łosicki' => 'Łosice',
            'makowski' => 'Maków Mazowiecki',
            'miński' => 'Mińsk Mazowiecki',
            'mławski' => 'Mława',
            'nowodworski' => 'Nowy Dwór Mazowiecki',
            'ostrołęcki' => 'Ostrołęka',
            'ostrowski' => 'Ostrów Mazowiecka',
            'otwocki' => 'Otwock',
            'piaseczyński' => 'Piaseczno',
            'płocki' => 'Płock',
            'płoński' => 'Płońsk',
            'pruszkowski' => 'Pruszków',
            'przasnyski' => 'Przasnysz',
            'przysuski' => 'Przysucha',
            'pułtuski' => 'Pułtusk',
            'radomski' => 'Radom',
            'siedlecki' => 'Siedlce',
            'sierpecki' => 'Sierpc',
            'sochaczewski' => 'Sochaczew',
            'sokołowski' => 'Sokołów Podlaski',
            'szydłowiecki' => 'Szydłowiec',
            'warszawski zachodni' => 'Ożarów Mazowiecki',
            'węgrowski' => 'Węgrów',
            'wołomiński' => 'Wołomin',
            'wyszkowski' => 'Wyszków',
            'zwoleński' => 'Zwoleń',
            'żuromiński' => 'Żuromin',
            'żyrardowski' => 'Żyrardów'
        ]
    ],
    'opolskie'=>
    [
        'powiat_grodzki'=>
        [
            'Opole'
        ],
        'powiat_ziemski'=>
        [
            'brzeski' => 'Brzeg',
            'głubczycki' => 'Głubczyce',
            'kędzierzyńsko-kozielski' => 'Kędzierzyn-Koźle',
            'kluczborski' => 'Kluczbork',
            'krapkowicki' => 'Krapkowice',
            'namysłowski' => 'Namysłów',
            'nyski' => 'Nysa',
            'oleski' => 'Olesno',
            'opolski' => 'Opole',
            'prudnicki' => 'Prudnik',
            'strzelecki' => 'Strzelce Opolskie'
        ]
    ],
    'podkarpackie'=>
    [
        'powiat_grodzki'=>
        [
            'Rzeszów',
            'Krosno',
            'Przemyśl',
            'Tarnobrzeg'
        ],
        'powiat_ziemski'=>
        [
            'bieszczadzki' => 'Ustrzyki Dolne',
            'brzozowski' => 'Brzozów',
            'dębicki' => 'Dębica',
            'jarosławski' => 'Jarosław',
            'jasielski' => 'Jasło',
            'kolbuszowski' => 'Kolbuszowa',
            'krośnieński' => 'Krosno',
            'leski' => 'Lesko',
            'leżajski' => 'Leżajsk',
            'lubaczowski' => 'Lubaczów',
            'łańcucki' => 'Łańcut',
            'mielecki' => 'Mielec',
            'niżański' => 'Nisko',
            'przemyski' => 'Przemyśl',
            'przeworski' => 'Przeworsk',
            'ropczycko-sędziszowski' => 'Ropczyce',
            'rzeszowski' => 'Rzeszów',
            'sanocki' => 'Sanok',
            'stalowowolski' => 'Stalowa Wola',
            'strzyżowski' => 'Strzyżów',
            'tarnobrzeski' => 'Tarnobrzeg'
        ]
    ],
    'podlaskie'=>
    [
        'powiat_grodzki'=>
        [
            'Białystok',
            'Łomża',
            'Suwałki'
        ],
        'powiat_ziemski'=>
        [
            'augustowski' => 'Augustów',
            'białostocki' => 'Białystok',
            'bielski' => 'Bielsk Podlaski',
            'grajewski' => 'Grajewo',
            'hajnowski' => 'Hajnówka',
            'kolneński' => 'Kolno',
            'łomżyński' => 'Łomża',
            'moniecki' => 'Mońki',
            'sejneński' => 'Sejny',
            'siemiatycki' => 'Siemiatycze',
            'sokólski' => 'Sokółka',
            'suwalski' => 'Suwałki',
            'wysokomazowiecki' => 'Wysokie Mazowieckie',
            'zambrowski' => 'Zambrów'
        ]
    ],
    'pomorskie'=>
    [
        'powiat_grodzki'=>
        [
            'Gdańsk',
            'Gdynia',
            'Słupsk',
            'Sopot'
        ],
        'powiat_ziemski'=>
        [
            'bytowski' => 'Bytów',
            'chojnicki' => 'Chojnice',
            'człuchowski' => 'Człuchów',
            'kartuski' => 'Kartuzy',
            'kościerski' => 'Kościerzyna',
            'kwidzyński' => 'Kwidzyn',
            'lęborski' => 'Lębork',
            'malborski' => 'Malbork',
            'nowodworski' => 'Nowy Dwór Gdański',
            'gdański' => 'Pruszcz Gdański',
            'pucki' => 'Puck',
            'słupski' => 'Słupsk',
            'starogardzki' => 'Starogard Gdański',
            'sztumski' => 'Sztum',
            'tczewski' => 'Tczew',
            'wejherowski' => 'Wejherowo'
        ]
    ],
    'śląskie'=>
    [
        'powiat_grodzki'=>
        [
            'Katowice',
            'Bielsko-Biała',
            'Bytom',
            'Chorzów',
            'Częstochowa',
            'Dąbrowa Górnicza',
            'Gliwice',
            'Jastrzębie-Zdrój',
            'Jaworzno',
            'Mysłowice',
            'Piekary Śląskie',
            'Ruda Śląska',
            'Rybnik',
            'Siemianowice Śląskie',
            'Sosnowiec',
            'Świętochłowice',
            'Tychy',
            'Zabrze',
            'Żory'
        ],
        'powiat_ziemski'=>
        [
            'będziński' => 'Będzin',
            'bielski' => 'Bielsko-Biała',
            'bieruńsko-lędziński' => 'Bieruń',
            'cieszyński' => 'Cieszyn',
            'częstochowski' => 'Częstochowa',
            'gliwicki' => 'Gliwice',
            'kłobucki' => 'Kłobuck',
            'lubliniecki' => 'Lubliniec',
            'mikołowski' => 'Mikołów',
            'myszkowski' => 'Myszków',
            'pszczyński' => 'Pszczyna',
            'raciborski' => 'Racibórz',
            'rybnicki' => 'Rybnik',
            'tarnogórski' => 'Tarnowskie Góry',
            'wodzisławski' => 'Wodzisław Śląski',
            'zawierciański' => 'Zawiercie',
            'żywiecki' => 'Żywiec'
        ]
    ],
    'świętokrzyskie'=>
    [
        'powiat_grodzki'=>
        [
            'Kielce'
        ],
        'powiat_ziemski'=>
        [
            'buski' => 'Busko-Zdrój',
            'jędrzejowski' => 'Jędrzejów',
            'kazimierski' => 'Kazimierza Wielka',
            'kielecki' => 'Kielce',
            'konecki' => 'Końskie',
            'opatowski' => 'Opatów',
            'ostrowiecki' => 'Ostrowiec Świętokrzyski',
            'pińczowski' => 'Pińczów',
            'sandomierski' => 'Sandomierz',
            'skarżyski' => 'Skarżysko-Kamienna',
            'starachowicki' => 'Starachowice',
            'staszowski' => 'Staszów',
            'włoszczowski' => 'Włoszczowa'
        ]
    ],
    'warmińsko-mazurskie'=>
    [
        'powiat_grodzki'=>
        [
            'Olsztyn',
            'Elbląg'
        ],
        'powiat_ziemski'=>
        [
            'bartoszycki' => 'Bartoszyce',
            'braniewski' => 'Braniewo',
            'działdowski' => 'Działdowo',
            'elbląski' => 'Elbląg',
            'ełcki' => 'Ełk',
            'giżycki' => 'Giżycko',
            'gołdapski' => 'Gołdap',
            'iławski' => 'Iława',
            'kętrzyński' => 'Kętrzyn',
            'lidzbarski' => 'Lidzbark Warmiński',
            'mrągowski' => 'Mrągowo',
            'nidzicki' => 'Nidzica',
            'nowomiejski' => 'Nowe Miasto Lubawskie',
            'olecki' => 'Olecko',
            'olsztyński' => 'Olsztyn',
            'ostródzki' => 'Ostróda',
            'piski' => 'Pisz',
            'szczycieński' => 'Szczytno',
            'węgorzewski' => 'Węgorzewo'
        ]
    ],
    'wielkopolskie'=>
    [
        'powiat_grodzki'=>
        [
            'Poznań',
            'Kalisz',
            'Konin',
            'Leszno'
        ],
        'powiat_ziemski'=>
        [
            'chodzieski' => 'Chodzież',
            'czarnkowsko-trzcianecki' => 'Czarnków',
            'gnieźnieński' => 'Gniezno',
            'gostyński' => 'Gostyń',
            'grodziski' => 'Grodzisk Wielkopolski',
            'jarociński' => 'Jarocin',
            'kaliski' => 'Kalisz',
            'kępiński' => 'Kępno',
            'kolski' => 'Koło',
            'koniński' => 'Konin',
            'kościański' => 'Kościan',
            'krotoszyński' => 'Krotoszyn',
            'leszczyński' => 'Leszno',
            'międzychodzki' => 'Międzychód',
            'nowotomyski' => 'Nowy Tomyśl',
            'obornicki' => 'Oborniki',
            'ostrowski' => 'Ostrów Wielkopolski',
            'ostrzeszowski' => 'Ostrzeszów',
            'pilski' => 'Piła',
            'pleszewski' => 'Pleszew',
            'poznański' => 'Poznań',
            'rawicki' => 'Rawicz',
            'słupecki' => 'Słupca',
            'szamotulski' => 'Szamotuły',
            'średzki' => 'Środa Wielkopolska',
            'śremski' => 'Śrem',
            'turecki' => 'Turek',
            'wągrowiecki' => 'Wągrowiec',
            'wolsztyński' => 'Wolsztyn',
            'wrzesiński' => 'Września',
            'złotowski' => 'Złotów'
        ]
    ],
    'zachodniopomorskie'=>
    [
        'powiat_grodzki'=>
        [
            'Szczecin',
            'Koszalin',
            'Świnoujście'
        ],
        'powiat_ziemski'=>
        [
            'białogardzki' => 'Białogard',
            'choszczeński' => 'Choszczno',
            'drawski' => 'Drawsko Pomorskie',
            'goleniowski' => 'Goleniów',
            'gryficki' => 'Gryfice',
            'gryfiński' => 'Gryfino',
            'kamieński' => 'Kamień Pomorski',
            'kołobrzeski' => 'Kołobrzeg',
            'koszaliński' => 'Koszalin',
            'łobeski' => 'Łobez',
            'myśliborski' => 'Myślibórz',
            'policki' => 'Police',
            'pyrzycki' => 'Pyrzyce',
            'sławieński' => 'Sławno',
            'stargardzki' => 'Stargard',
            'szczecinecki' => 'Szczecinek',
            'świdwiński' => 'Świdwin',
            'wałecki' => 'Wałcz'
        ]
    ]
];

$administrativeDef = (new StructDefinition)
    ->networkName('administrative');

$wioStruct->structQuery($administrativeDef)
    ->add('NodeType', 'state')
    ->add('NodeType', 'powiat_grodzki')
    ->add('NodeType', 'powiat_ziemski')
    ->add('NodeType', 'city');

$stateId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('state')
        )->getId('NodeType');

$powiatGrodzkiId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('powiat_grodzki')
        )->getId('NodeType');

$powiatZiemskiId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('powiat_ziemski')
        )->getId('NodeType');

$cityId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('city')
        )->getId('NodeType');


$dodaneMiasta = [];
foreach ($map as $wojNazwa => $wojData)
{
    $wioStruct->structQuery((new StructDefinition)->nodeTypeId($stateId))
        ->add('Node',$wojNazwa);

    $wojId = $wioStruct->structQuery(
        (new StructDefinition)
            ->nodeTypeId($stateId)
            ->nodeName($wojNazwa)
        )->getId('Node');


    foreach ($wojData['powiat_grodzki'] as $powiatGrodzki)
    {
        $wioStruct->structQuery((new StructDefinition)->nodeTypeId($powiatGrodzkiId))
            ->add('Node',$powiatGrodzki)
            ->add('LinkParent',$wojId);

        $powGroId = $wioStruct->structQuery(
            (new StructDefinition)
                ->nodeTypeId($powiatGrodzkiId)
                ->nodeName($powiatGrodzki)
            )->getId('Node');

        $wioStruct->structQuery((new StructDefinition)->nodeTypeId($cityId))
            ->add('Node',$powiatGrodzki)
            ->add('LinkParent',$powGroId);

        $dodaneMiasta[$powiatGrodzki] = true;
    }

    foreach ($wojData['powiat_ziemski'] as $powiatZiemski=>$miastoWpowiecie)
    {

        $wioStruct->structQuery((new StructDefinition)->nodeTypeId($powiatZiemskiId))
            ->add('Node',$powiatZiemski)
            ->add('LinkParent',$wojId);

        $powZieId = $wioStruct->structQuery(
            (new StructDefinition)
                ->nodeTypeId($powiatZiemskiId)
                ->nodeName($powiatZiemski)
            )->getId('Node');

        if (!isset($dodaneMiasta[$miastoWpowiecie]))
        {
            $wioStruct->structQuery((new StructDefinition)->nodeTypeId($cityId))
                ->add('Node',$miastoWpowiecie)
                ->add('LinkParent',$powZieId);


        }
    }
}


$powiaty = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('administrative')
        ->nodeTypeName('powiat_ziemski')
    )->get('Node');

tab_dump($powiaty);

dump_database($qb);
