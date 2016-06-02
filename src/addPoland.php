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
            ['Wrocław',51.1079,17.0385],
            ['Jelenia Góra',0,0],
            ['Legnica',51.207,16.1553],
            ['Wałbrzych',0,0]
        ],
        'powiat_ziemski'=>
        [
            'bolesławiecki' => ['Bolesławiec',0,0],
            'dzierżoniowski' => ['Dzierżoniów',0,0],
            'głogowski' => ['Głogów',0,0],
            'górowski' => ['Góra',0,0],
            'jaworski' => ['Jawor',0,0],
            'jeleniogórski' => ['Jelenia Góra',0,0],
            'kamiennogórski' => ['Kamienna Góra',0,0],
            'kłodzki' => ['Kłodzko',0,0],
            'legnicki' => ['Legnica',0,0],
            'lubański' => ['Lubań',0,0],
            'lubiński' => ['Lubin',0,0],
            'lwówecki' => ['Lwówek Śląski',0,0],
            'milicki' => ['Milicz',0,0],
            'oleśnicki' => ['Oleśnica',0,0],
            'oławski' => ['Oława',0,0],
            'polkowicki' => ['Polkowice',0,0],
            'strzeliński' => ['Strzelin',0,0],
            'średzki' => ['Środa Śląska',1,1],
            'świdnicki' => ['Świdnica',0,0],
            'trzebnicki' => ['Trzebnica',0,0],
            'wałbrzyski' => ['Wałbrzych',0,0],
            'wołowski' => ['Wołów',0,0],
            'wrocławski' => ['Wrocław',0,0],
            'ząbkowicki' => ['Ząbkowice Śląskie',0,0],
            'zgorzelecki' => ['Zgorzelec',0,0],
            'złotoryjski' => ['Złotoryja',0,0]
        ]
    ],
    'kujawsko-pomorskie'=>
    [
        'powiat_grodzki'=>
        [
            ['Bydgoszcz',53.1184692552,18.0181604004],
            ['Toruń',53.0119175901,18.5975175476],
            ['Włocławek',0,0],
            ['Grudziądz',0,0]
        ],
        'powiat_ziemski'=>
        [
            'aleksandrowski' => ['Aleksandrów Kujawski',0,0],
            'brodnicki' => ['Brodnica',0,0],
            'bydgoski' => ['Bydgoszcz',53.1184692552,18.0181604004],
            'chełmiński' => ['Chełmno',0,0],
            'golubsko-dobrzyński' => ['Golub-Dobrzyń',0,0],
            'grudziądzki' => ['Grudziądz',0,0],
            'inowrocławski' => ['Inowrocław',0,0],
            'lipnowski' => ['Lipno',0,0],
            'mogileński' => ['Mogilno',0,0],
            'nakielski' => ['Nakło nad Notecią',0,0],
            'radziejowski' => ['Radziejów',0,0],
            'rypiński' => ['Rypin',0,0],
            'sępoleński' => ['Sępólno Krajeńskie',0,0],
            'świecki' => ['Świecie',0,0],
            'toruński' => ['Toruń',53.0119175901,18.5975175476],
            'tucholski' => ['Tuchola',0,0],
            'wąbrzeski' => ['Wąbrzeźno',0,0],
            'włocławski' => ['Włocławek',0,0],
            'żniński' => ['Żnin',0,0]
        ]
    ],
    'lubelskie'=>
    [
        'powiat_grodzki'=>
        [
            ['Lublin',51.2465,22.5684],
            ['Biała Podlaska',52.0387,23.1445],
            ['Chełm',0,0],
            ['Zamość',0,0]
        ],
        'powiat_ziemski'=>
        [
            'bialski' => ['Biała Podlaska',0,0],
            'biłgorajski' => ['Biłgoraj',0,0],
            'chełmski' => ['Chełm',0,0],
            'hrubieszowski' => ['Hrubieszów',0,0],
            'janowski' => ['Janów Lubelski',0,0],
            'krasnostawski' => ['Krasnystaw',0,0],
            'kraśnicki' => ['Kraśnik',0,0],
            'lubartowski' => ['Lubartów',0,0],
            'lubelski' => ['Lublin',0,0],
            'łęczyński' => ['Łęczna',0,0],
            'łukowski' => ['Łuków',0,0],
            'opolski' => ['Opole Lubelskie',1,1],
            'parczewski' => ['Parczew',0,0],
            'puławski' => ['Puławy',0,0],
            'radzyński' => ['Radzyń Podlaski',0,0],
            'rycki' => ['Ryki',0,0],
            'świdnicki' => ['Świdnik',1,1],
            'tomaszowski' => ['Tomaszów Lubelski',1,1],
            'włodawski' => ['Włodawa',0,0],
            'zamojski' => ['Zamość',0,0]
        ]
    ],
    'lubuskie'=>
    [
        'powiat_grodzki'=>
        [
            ['Gorzów Wielkopolski',52.7325,15.2369],
            ['Zielona Góra',51.9356,15.5062]
        ],
        'powiat_ziemski'=>
        [
            'gorzowski' => ['Gorzów Wielkopolski',0,0],
            'krośnieński' => ['Krosno Odrzańskie',1,1],
            'międzyrzecki' => ['Międzyrzecz',0,0],
            'nowosolski' => ['Nowa Sól',0,0],
            'słubicki' => ['Słubice',0,0],
            'strzelecko-drezdenecki' => ['Strzelce Krajeńskie',0,0],
            'sulęciński' => ['Sulęcin',0,0],
            'świebodziński' => ['Świebodzin',0,0],
            'wschowski' => ['Wschowa',0,0],
            'zielonogórski' => ['Zielona Góra',0,0],
            'żagański' => ['Żagań',0,0],
            'żarski' => ['Żary',0,0]
        ]
    ],
    'łódzkie'=>
    [
        'powiat_grodzki'=>
        [
            ['Łódź',51.7592,19.456],
            ['Piotrków Trybunalski',0,0],
            ['Skierniewice',0,0]
        ],
        'powiat_ziemski'=>
        [
            'bełchatowski' => ['Bełchatów',0,0],
            'brzeziński' => ['Brzeziny',0,0],
            'kutnowski' => ['Kutno',0,0],
            'łaski' => ['Łask',0,0],
            'łęczycki' => ['Łęczyca',0,0],
            'łowicki' => ['Łowicz',0,0],
            'łódzki wschodni' => ['Łódź',0,0],
            'opoczyński' => ['Opoczno',0,0],
            'pabianicki' => ['Pabianice',0,0],
            'pajęczański' => ['Pajęczno',0,0],
            'piotrkowski' => ['Piotrków Trybunalski',0,0],
            'poddębicki' => ['Poddębice',0,0],
            'radomszczański' => ['Radomsko',0,0],
            'rawski' => ['Rawa Mazowiecka',0,0],
            'sieradzki' => ['Sieradz',0,0],
            'skierniewicki' => ['Skierniewice',0,0],
            'tomaszowski' => ['Tomaszów Mazowiecki',0,0],
            'wieluński' => ['Wieluń',0,0],
            'wieruszowski' => ['Wieruszów',0,0],
            'zduńskowolski' => ['Zduńska Wola',0,0],
            'zgierski' => ['Zgierz',0,0]
        ]
    ],
    'małopolskie'=>
    [
        'powiat_grodzki'=>
        [
            ['Kraków',50.0605443,19.9417183],
            ['Nowy Sącz',0,0],
            ['Tarnów',50.0121,20.9858]
        ],
        'powiat_ziemski'=>
        [
            'bocheński' => ['Bochnia',0,0],
            'brzeski' => ['Brzesko',1,1],
            'chrzanowski' => ['Chrzanów',0,0],
            'dąbrowski' => ['Dąbrowa Tarnowska',0,0],
            'gorlicki' => ['Gorlice',0,0],
            'krakowski' => ['Kraków',0,0],
            'limanowski' => ['Limanowa',0,0],
            'miechowski' => ['Miechów',0,0],
            'myślenicki' => ['Myślenice',0,0],
            'nowosądecki' => ['Nowy Sącz',0,0],
            'nowotarski' => ['Nowy Targ',0,0],
            'olkuski' => ['Olkusz',0,0],
            'oświęcimski' => ['Oświęcim',0,0],
            'proszowicki' => ['Proszowice',0,0],
            'suski' => ['Sucha Beskidzka',0,0],
            'tarnowski' => ['Tarnów',0,0],
            'tatrzański' => ['Zakopane',0,0],
            'wadowicki' => ['Wadowice',0,0],
            'wielicki' => ['Wieliczka',0,0]
        ]
    ],
    'mazowieckie'=>
    [
        'powiat_grodzki'=>
        [
            ['Warszawa',52.2343398678,21.0057550048],
            ['Ostrołęka',0,0],
            ['Płock',0,0],
            ['Radom',0,0],
            ['Siedlce',0,0]
        ],
        'powiat_ziemski'=>
        [
            'białobrzeski' => ['Białobrzegi',0,0],
            'ciechanowski' => ['Ciechanów',0,0],
            'garwoliński' => ['Garwolin',0,0],
            'gostyniński' => ['Gostynin',0,0],
            'grodziski' => ['Grodzisk Mazowiecki',0,0],
            'grójecki' => ['Grójec',0,0],
            'kozienicki' => ['Kozienice',0,0],
            'legionowski' => ['Legionowo',0,0],
            'lipski' => ['Lipsko',0,0],
            'łosicki' => ['Łosice',0,0],
            'makowski' => ['Maków Mazowiecki',0,0],
            'miński' => ['Mińsk Mazowiecki',0,0],
            'mławski' => ['Mława',0,0],
            'nowodworski' => ['Nowy Dwór Mazowiecki',0,0],
            'ostrołęcki' => ['Ostrołęka',0,0],
            'ostrowski' => ['Ostrów Mazowiecka',1,1],
            'otwocki' => ['Otwock',0,0],
            'piaseczyński' => ['Piaseczno',0,0],
            'płocki' => ['Płock',0,0],
            'płoński' => ['Płońsk',0,0],
            'pruszkowski' => ['Pruszków',0,0],
            'przasnyski' => ['Przasnysz',0,0],
            'przysuski' => ['Przysucha',0,0],
            'pułtuski' => ['Pułtusk',0,0],
            'radomski' => ['Radom',0,0],
            'siedlecki' => ['Siedlce',0,0],
            'sierpecki' => ['Sierpc',0,0],
            'sochaczewski' => ['Sochaczew',0,0],
            'sokołowski' => ['Sokołów Podlaski',0,0],
            'szydłowiecki' => ['Szydłowiec',0,0],
            'warszawski zachodni' => ['Ożarów Mazowiecki',0,0],
            'węgrowski' => ['Węgrów',0,0],
            'wołomiński' => ['Wołomin',0,0],
            'wyszkowski' => ['Wyszków',0,0],
            'zwoleński' => ['Zwoleń',0,0],
            'żuromiński' => ['Żuromin',0,0],
            'żyrardowski' => ['Żyrardów',0,0]
        ]
    ],
    'opolskie'=>
    [
        'powiat_grodzki'=>
        [
            ['Opole',50.6751,17.9213]
        ],
        'powiat_ziemski'=>
        [
            'brzeski' => ['Brzeg',0,0],
            'głubczycki' => ['Głubczyce',0,0],
            'kędzierzyńsko-kozielski' => ['Kędzierzyn-Koźle',0,0],
            'kluczborski' => ['Kluczbork',0,0],
            'krapkowicki' => ['Krapkowice',0,0],
            'namysłowski' => ['Namysłów',0,0],
            'nyski' => ['Nysa',0,0],
            'oleski' => ['Olesno',0,0],
            'opolski' => ['Opole',0,0],
            'prudnicki' => ['Prudnik',0,0],
            'strzelecki' => ['Strzelce Opolskie',0,0]
        ]
    ],
    'podkarpackie'=>
    [
        'powiat_grodzki'=>
        [
            ['Rzeszów',50.0412,21.9991],
            ['Krosno',0,0],
            ['Przemyśl',49.7839,22.7678],
            ['Tarnobrzeg',0,0]
        ],
        'powiat_ziemski'=>
        [
            'bieszczadzki' => ['Ustrzyki Dolne',0,0],
            'brzozowski' => ['Brzozów',0,0],
            'dębicki' => ['Dębica',0,0],
            'jarosławski' => ['Jarosław',0,0],
            'jasielski' => ['Jasło',0,0],
            'kolbuszowski' => ['Kolbuszowa',0,0],
            'krośnieński' => ['Krosno',0,0],
            'leski' => ['Lesko',0,0],
            'leżajski' => ['Leżajsk',0,0],
            'lubaczowski' => ['Lubaczów',0,0],
            'łańcucki' => ['Łańcut',0,0],
            'mielecki' => ['Mielec',0,0],
            'niżański' => ['Nisko',0,0],
            'przemyski' => ['Przemyśl',0,0],
            'przeworski' => ['Przeworsk',0,0],
            'ropczycko-sędziszowski' => ['Ropczyce',0,0],
            'rzeszowski' => ['Rzeszów',0,0],
            'sanocki' => ['Sanok',0,0],
            'stalowowolski' => ['Stalowa Wola',0,0],
            'strzyżowski' => ['Strzyżów',0,0],
            'tarnobrzeski' => ['Tarnobrzeg',0,0]
        ]
    ],
    'podlaskie'=>
    [
        'powiat_grodzki'=>
        [
            ['Białystok',53.1325,23.1688],
            ['Łomża',0,0],
            ['Suwałki',54.1115,22.9308]
        ],
        'powiat_ziemski'=>
        [
            'augustowski' => ['Augustów',0,0],
            'białostocki' => ['Białystok',0,0],
            'bielski' => ['Bielsk Podlaski',0,0],
            'grajewski' => ['Grajewo',0,0],
            'hajnowski' => ['Hajnówka',0,0],
            'kolneński' => ['Kolno',0,0],
            'łomżyński' => ['Łomża',0,0],
            'moniecki' => ['Mońki',0,0],
            'sejneński' => ['Sejny',0,0],
            'siemiatycki' => ['Siemiatycze',0,0],
            'sokólski' => ['Sokółka',0,0],
            'suwalski' => ['Suwałki',0,0],
            'wysokomazowiecki' => ['Wysokie Mazowieckie',0,0],
            'zambrowski' => ['Zambrów',0,0]
        ]
    ],
    'pomorskie'=>
    [
        'powiat_grodzki'=>
        [
            ['Gdańsk',54.352,18.6466],
            ['Gdynia',54.5189,18.5305],
            ['Słupsk',54.4641,17.0285],
            ['Sopot',54.4416,18.5601]
        ],
        'powiat_ziemski'=>
        [
            'bytowski' => ['Bytów',0,0],
            'chojnicki' => ['Chojnice',0,0],
            'człuchowski' => ['Człuchów',0,0],
            'kartuski' => ['Kartuzy',0,0],
            'kościerski' => ['Kościerzyna',0,0],
            'kwidzyński' => ['Kwidzyn',0,0],
            'lęborski' => ['Lębork',0,0],
            'malborski' => ['Malbork',0,0],
            'nowodworski' => ['Nowy Dwór Gdański',1,1],
            'gdański' => ['Pruszcz Gdański',0,0],
            'pucki' => ['Puck',0,0],
            'słupski' => ['Słupsk',0,0],
            'starogardzki' => ['Starogard Gdański',0,0],
            'sztumski' => ['Sztum',0,0],
            'tczewski' => ['Tczew',0,0],
            'wejherowski' => ['Wejherowo',0,0]
        ]
    ],
    'śląskie'=>
    [
        'powiat_grodzki'=>
        [
            ['Katowice',50.2649,19.0238],
            ['Bielsko-Biała',49.8224,19.0584],
            ['Bytom',0,0],
            ['Chorzów',0,0],
            ['Częstochowa',0,0],
            ['Dąbrowa Górnicza',0,0],
            ['Gliwice',50.2945,18.6714],
            ['Jastrzębie-Zdrój',0,0],
            ['Jaworzno',0,0],
            ['Mysłowice',50.208,19.1661],
            ['Piekary Śląskie',0,0],
            ['Ruda Śląska',0,0],
            ['Rybnik',0,0],
            ['Siemianowice Śląskie',0,0],
            ['Sosnowiec',50.2863,19.1041],
            ['Świętochłowice',0,0],
            ['Tychy',0,0],
            ['Zabrze',0,0],
            ['Żory',0,0]
        ],
        'powiat_ziemski'=>
        [
            'będziński' => ['Będzin',0,0],
            'bielski' => ['Bielsko-Biała',1,1],
            'bieruńsko-lędziński' => ['Bieruń',0,0],
            'cieszyński' => ['Cieszyn',0,0],
            'częstochowski' => ['Częstochowa',0,0],
            'gliwicki' => ['Gliwice',0,0],
            'kłobucki' => ['Kłobuck',0,0],
            'lubliniecki' => ['Lubliniec',0,0],
            'mikołowski' => ['Mikołów',0,0],
            'myszkowski' => ['Myszków',0,0],
            'pszczyński' => ['Pszczyna',0,0],
            'raciborski' => ['Racibórz',0,0],
            'rybnicki' => ['Rybnik',0,0],
            'tarnogórski' => ['Tarnowskie Góry',0,0],
            'wodzisławski' => ['Wodzisław Śląski',0,0],
            'zawierciański' => ['Zawiercie',0,0],
            'żywiecki' => ['Żywiec',0,0]
        ]
    ],
    'świętokrzyskie'=>
    [
        'powiat_grodzki'=>
        [
            ['Kielce',50.8661,20.6286]
        ],
        'powiat_ziemski'=>
        [
            'buski' => ['Busko-Zdrój',0,0],
            'jędrzejowski' => ['Jędrzejów',0,0],
            'kazimierski' => ['Kazimierza Wielka',0,0],
            'kielecki' => ['Kielce',0,0],
            'konecki' => ['Końskie',0,0],
            'opatowski' => ['Opatów',0,0],
            'ostrowiecki' => ['Ostrowiec Świętokrzyski',0,0],
            'pińczowski' => ['Pińczów',0,0],
            'sandomierski' => ['Sandomierz',0,0],
            'skarżyski' => ['Skarżysko-Kamienna',0,0],
            'starachowicki' => ['Starachowice',0,0],
            'staszowski' => ['Staszów',0,0],
            'włoszczowski' => ['Włoszczowa',0,0]
        ]
    ],
    'warmińsko-mazurskie'=>
    [
        'powiat_grodzki'=>
        [
            ['Olsztyn',53.7784,20.4801],
            ['Elbląg',0,0]
        ],
        'powiat_ziemski'=>
        [
            'bartoszycki' => ['Bartoszyce',0,0],
            'braniewski' => ['Braniewo',0,0],
            'działdowski' => ['Działdowo',0,0],
            'elbląski' => ['Elbląg',0,0],
            'ełcki' => ['Ełk',0,0],
            'giżycki' => ['Giżycko',0,0],
            'gołdapski' => ['Gołdap',0,0],
            'iławski' => ['Iława',0,0],
            'kętrzyński' => ['Kętrzyn',0,0],
            'lidzbarski' => ['Lidzbark Warmiński',0,0],
            'mrągowski' => ['Mrągowo',0,0],
            'nidzicki' => ['Nidzica',0,0],
            'nowomiejski' => ['Nowe Miasto Lubawskie',0,0],
            'olecki' => ['Olecko',0,0],
            'olsztyński' => ['Olsztyn',0,0],
            'ostródzki' => ['Ostróda',0,0],
            'piski' => ['Pisz',0,0],
            'szczycieński' => ['Szczytno',0,0],
            'węgorzewski' => ['Węgorzewo',0,0]
        ]
    ],
    'wielkopolskie'=>
    [
        'powiat_grodzki'=>
        [
            ['Poznań',52.4064,16.9252],
            ['Kalisz',0,0],
            ['Konin',0,0],
            ['Leszno',0,0]
        ],
        'powiat_ziemski'=>
        [
            'chodzieski' => ['Chodzież',0,0],
            'czarnkowsko-trzcianecki' => ['Czarnków',0,0],
            'gnieźnieński' => ['Gniezno',0,0],
            'gostyński' => ['Gostyń',0,0],
            'grodziski' => ['Grodzisk Wielkopolski',1,1],
            'jarociński' => ['Jarocin',0,0],
            'kaliski' => ['Kalisz',0,0],
            'kępiński' => ['Kępno',0,0],
            'kolski' => ['Koło',0,0],
            'koniński' => ['Konin',0,0],
            'kościański' => ['Kościan',0,0],
            'krotoszyński' => ['Krotoszyn',0,0],
            'leszczyński' => ['Leszno',0,0],
            'międzychodzki' => ['Międzychód',0,0],
            'nowotomyski' => ['Nowy Tomyśl',0,0],
            'obornicki' => ['Oborniki',0,0],
            'ostrowski' => ['Ostrów Wielkopolski',0,0],
            'ostrzeszowski' => ['Ostrzeszów',0,0],
            'pilski' => ['Piła',0,0],
            'pleszewski' => ['Pleszew',0,0],
            'poznański' => ['Poznań',0,0],
            'rawicki' => ['Rawicz',0,0],
            'słupecki' => ['Słupca',0,0],
            'szamotulski' => ['Szamotuły',0,0],
            'średzki' => ['Środa Wielkopolska',0,0],
            'śremski' => ['Śrem',0,0],
            'turecki' => ['Turek',0,0],
            'wągrowiecki' => ['Wągrowiec',0,0],
            'wolsztyński' => ['Wolsztyn',0,0],
            'wrzesiński' => ['Września',0,0],
            'złotowski' => ['Złotów',0,0]
        ]
    ],
    'zachodniopomorskie'=>
    [
        'powiat_grodzki'=>
        [
            ['Szczecin',51.9187,19.7128],
            ['Koszalin',0,0],
            ['Świnoujście',0,0]
        ],
        'powiat_ziemski'=>
        [
            'białogardzki' => ['Białogard',0,0],
            'choszczeński' => ['Choszczno',0,0],
            'drawski' => ['Drawsko Pomorskie',0,0],
            'goleniowski' => ['Goleniów',0,0],
            'gryficki' => ['Gryfice',0,0],
            'gryfiński' => ['Gryfino',0,0],
            'kamieński' => ['Kamień Pomorski',0,0],
            'kołobrzeski' => ['Kołobrzeg',0,0],
            'koszaliński' => ['Koszalin',0,0],
            'łobeski' => ['Łobez',0,0],
            'myśliborski' => ['Myślibórz',0,0],
            'policki' => ['Police',0,0],
            'pyrzycki' => ['Pyrzyce',0,0],
            'sławieński' => ['Sławno',0,0],
            'stargardzki' => ['Stargard',0,0],
            'szczecinecki' => ['Szczecinek',0,0],
            'świdwiński' => ['Świdwin',0,0],
            'wałecki' => ['Wałcz',0,0]
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
            ->add('Node',$powiatGrodzki[0],$powiatGrodzki[1],$powiatGrodzki[2])
            ->add('LinkParent',$wojId);

        $powGroId = $wioStruct->structQuery(
            (new StructDefinition)
                ->nodeTypeId($powiatGrodzkiId)
                ->nodeName($powiatGrodzki[0])
                ->nodeLatLng($powiatGrodzki[1],$powiatGrodzki[2])
            )->getId('Node');

        $wioStruct->structQuery((new StructDefinition)->nodeTypeId($cityId))
            ->add('Node',$powiatGrodzki[0],$powiatGrodzki[1],$powiatGrodzki[2])
            ->add('LinkParent',$powGroId);

        $dodaneMiasta[$powiatGrodzki[0]] = true;
    }

    foreach ($wojData['powiat_ziemski'] as $powiatZiemski=>$miastoWpowiecie)
    {

        $wioStruct->structQuery((new StructDefinition)->nodeTypeId($powiatZiemskiId))
            ->add('Node',$powiatZiemski,$miastoWpowiecie[1],$miastoWpowiecie[2])
            ->add('LinkParent',$wojId);

        $powZieId = $wioStruct->structQuery(
            (new StructDefinition)
                ->nodeTypeId($powiatZiemskiId)
                ->nodeName($powiatZiemski)
                ->nodeLatLng($miastoWpowiecie[1],$miastoWpowiecie[2])
            )->getId('Node');

        if (!isset($dodaneMiasta[$miastoWpowiecie[0]]))
        {
            $wioStruct->structQuery((new StructDefinition)->nodeTypeId($cityId))
                ->add('Node',$miastoWpowiecie[0],$miastoWpowiecie[1],$miastoWpowiecie[2])
                ->add('LinkParent',$powZieId);


        }
    }
}


$powiaty = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('administrative')
        ->nodeTypeName('state')
    )->get('Node');

tab_dump($powiaty);

dump_database($qb);
