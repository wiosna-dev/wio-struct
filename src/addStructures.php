<?php
namespace WioStruct;

use \WioStruct\Core\StructDefinition as StructDefinition;

require_once('exampleEnvironment.php');

echo '<!doctype HTML><html><head><meta charset="utf-8"></head><body>';

$RejonySZP = [
    "Dolnośląskie" =>
    [
        ["Wroclaw - Krzyki I",51.078336,17.050231],
        ["Wrocław - Biskupin",51.124212757827,16.973876953125],
        ["Wrocław - Brochów",51.0579567584,17.0658317589],
        ["Wrocław - Śródmieście",51.1221880207,17.01703125],
        ["Wrocław - Krzyki II",51.094251176843,16.994562148959],
        ["Wrocław - Stare Miasto",51.1042764578,17.0365762711],
        ["Środa Śląska",51.1606418969,16.5961175537],
        ["Wrocław - Nowy Dwór",51.1096096257,16.9544235253],
        ["Wrocław - Pilczyce/Kozanów",51.1246706528,16.9837474823],
        ["Wrocław - Psie Pole",51.1474788519,17.0579910278],
        ["Brzeg Dolny",51.2728265,16.708557],
        ["Smolec i okolice",51.0828218616,16.8838405609],
        ["Wołów",51.3364303139,16.6469293213],
        ["Strzelin",50.781032,17.064424],
        ["Świdnica",50.8498434,16.475679],
        ["Świebodzice",50.8569204614,16.3207727051],
        ["Wałbrzych",50.7823072438,16.2864404297],
        ["Kamienna Góra",50.748318230485,16.031694946289],
        ["Lubań",51.1189555498,15.2918344116],
        ["Jelenia Góra",50.8794544794,15.7371240235],
        ["Gmina Nowogrodziec",51.1973679,15.3983422],
        ["Gmina Zgorzelec",51.150066822903,15.008624436523],
        ["Bolesławiec",51.255039520217,15.626678466797],
        ["Złotoryja",51.1255056262,15.9154129028],
        ["Powiat głogowski",51.6637405006,16.0777001953],
        ["Legnica",51.222705931,16.1592713117],
        ["Lubin",51.4042025,16.1938917],
        ["Polkowice",51.4930562907,16.0529809571],
        ["Chojnów",51.272574956711,15.938168764099],
        ["Oleśnica",51.2107339003,17.3823266602],
        ["Syców",51.308018,17.720339],
        ["Milicz",51.5230839096,17.2642236328],
        ["Ziębice",50.5963145007,17.0370483398],
        ["Oława",50.942853859022,17.283210754395],
        ["Kłodzko",50.4375847,16.6558198],
        ["Wrocław - Leśnica",51.1450347721,16.8707328415],
        ["Bogatynia",50.9000015749,14.945526123],
        ["Oborniki Śląskie",51.3009866,16.9148091],
        ["Kowary",50.791406,15.837057],
        ["Boguszów-Gorce",50.756283,16.195443],
        ["Dzierżoniów ",50.731798,16.651447],
        ["Jelcz- Laskowice",51.021656,17.320118],
        ["Trzebnica",51.3078672134,17.0645141602],
        ["Lwówek Śląski",51.109502,15.588066],
        ["Bolków",50.924910,16.103626],
        ["Świeradów Zdrój",50.909922,15.345962],
        ["Żmigród",51.466557,16.905580]
    ],
    "Kujawsko-pomorskie" =>
    [
        ["Brodnica",53.253595168,19.391451416],
        ["Chełmża i okolice",53.1844724,18.6045572],
        ["Golub - Dobrzyń",53.111142,19.055922],
        ["Kowalewo Pomorskie i okolice",53.1548712504,18.901578126],
        ["Łubianka",53.138708,18.484417],
        ["Rypin",53.0657106,19.4094097],
        ["Bydgoszcz - Bartodzieje",53.1274987596,18.0129656321],
        ["Bydgoszcz - Osowa Góra",53.144269198614,17.947693405101],
        ["Toruń - Skarpa",53.0219835265,18.6868672943],
        ["Toruń - Stare Miasto",53.0119175901,18.5975175476],
        ["Bydgoszcz - Fordon",53.1529472988,18.1537485123],
        ["Bydgoszcz - Śródmieście",53.1184692552,18.0181604004],
        ["Koronowo i okolice",53.3155945,17.924967],
        ["Bydgoszcz - Wyżyny",53.1007239466,18.0398082733],
        ["Gmina Grudziądz",53.48456577,18.7899572119],
        ["Grudziądz Miasto",53.4712561987,18.7413697815],
        ["Świecie",53.4127074,18.4310907],
        ["Wąbrzeźno",53.280297,18.949503],
        ["Kikół",52.9091734,19.1198371],
        ["Kruszwica",52.67429,18.33159],
        ["Sępolno Krajeńskie",53.451078,17.528478],
        ["Toruń - Wrzosy",53.053431343392,18.585330962087],
        ["Toruń- Bydgoskie Przedmieście",53.0077601091,18.5670661926],
        ["Tuchola",53.587226,17.859998],
        ["Toruń - Uniwersytet",53.0217277976,18.5711216926],
        ["Solec Kujawski",53.0821892609,18.2255273437],
        ["Żnin",52.8493847,17.719477],
        ["Nakło nad Notecią",53.1431880749,17.6034265137],
        ["Lipno i okolice",52.85,19.1666667],
        ["Waganiec, Aleksandrów i okolice",52.8736888238,18.6932373047],
        ["Włocławek Południe i okolice",52.636204,19.068702],
        ["Głogowo, Lubicz, Szembekowo",53.014119,18.819322],
        ["Grębocin",53.057550,18.718148],
        ["Lubicz",53.031297,18.745048],
        ["Łysomice",53.085621,18.613584],
        ["Włocławek Północ",52.648196,19.074188],
        ["Inowrocław",52.799417,18.257123,
        ["Janowiec",51.323673,21.889625],
        ["Więcbork",53.353785,17.489998],
        ["Ciechocinek",52.879574,18.794054],
    ],

    "Lubuskie" =>
    [
        ["Sulęcin",52.444292034047,15.117187500016],
        ["Zielona Góra",51.9330736252,15.5064111327],
        ["Kostrzyn n/O",52.590604285758,14.648835322754],
        ["Strzelce Krajeńskie",52.87728,15.52966],
        ["Gorzów Wielkopolski Płn",52.736291655911,15.27099609375],
        ["Nowa Sól",51.8024852223,15.7233911132],
        ["Żary",51.6363897,15.1834109],
        ["Świebodzin",52.218361775025,15.594301757812],
        ["Wschowa",51.8071084,16.3164767],
        ["Gorzów Wielkopolski Płd",52.727919,15.223035],
        ["Sulechów",52.0361143,15.6143185],
        ["Krosno Odrzańskie",52.0328784285,15.0724511718],
        ["Międzyrzecz",52.4417807659,15.5720901489],
        ["Zielona Góra II ",51.936034,15.503192],
        ["Gubin",51.949159,14.725874],
        ["Żagań",51.6225465,15.3333949]
    ],
    "Łódzkie" =>
    [
        ["Rogów i okolice",51.817773,19.886082],
        ["Gmina Głowno",51.964651,19.715297],
        ["Kutno i okolica",52.230618,19.364278],
        ["Zduńska Wola i okolice",51.574938187014,18.916707570361],
        ["Konstantynów Łódzki i okolice",51.7476048,19.3254913],
        ["Wieluń",51.2130144068,18.5702297363],
        ["Zgierz i okolice",51.8550576,19.4060704],
        ["Piotrków Trybunalski",51.396604584,19.701651109],
        ["Łask i okolice",51.5896830791,19.1284661865],
        ["Ozorków i okolice",51.964238,19.290355],
        ["Gmina Szadek",51.692807,18.976794],
        ["Pajęczno i okolice",51.1458858967,18.9945703125],
        ["Radomsko i okolice",51.0635511,19.4425413],
        ["Przedbórz i okolice",51.0880091,19.8743170455],
        ["Powiat Opoczyński",51.3663360987,20.3003924335],
        ["Działoszyn i okolice",51.117178,18.864799],
        ["Tomaszów Mazowiecki",51.530809,19.999664],
        ["Pabianice i okolice",51.6563043227,19.3546700952],
        ["Andrespol i okolice",51.725505,19.643705],
        ["Brzeziny i okolice",51.800255,19.7516791],
        ["Koluszki i okolice",51.738289,19.819639],
        ["Rawa Mazowiecka i okolice",51.7594688048,20.2662377929],
        ["Łódź Górna-Rynek",51.7185210719,19.4708633423],
        ["Łódź Chojny",51.7260854689,19.476925988],
        ["Łódź Teofilów/Złotno",51.8008859343,19.3937015533],
        ["Łódź Żubardź",51.7873170625,19.4184323738],
        ["Łódź Inflacka",51.8012907349,19.4690608978],
        ["Aleksandrów Łódzki i okolice",51.8210468607,19.320758791],
        ["Łódź Retkinia/Zdrowie",51.7393605875,19.4073486327],
        ["Łódź Widzew/Podgórze",51.7664809081,19.5534997559],
        ["Łódź Julianów/Radogoszcz",51.8024726665,19.4458552788],
        ["Łódź Dąbrowa/Olechów",51.7362777954,19.5173835755],
        ["Łódź Centrum",51.7592485,19.4559833],
        ["Rzgów/Tuszyn i okolice",51.6586292993,19.4882684326],
        ["Stryków i okolice",51.9016224202,19.6043115234],
        ["Poddębice",51.893523,18.954835],
        ["Wieruszów",51.29486,18.15475],
        ["Świnice Warckie",52.042363,18.917527],
        ["Błaszki i Charłupia",51.65388,18.43367],
        ["Złoczew i Lututow",51.4171945606,18.6074066162],
        ["Piątek",52.068758,19.478800],
        ["Biała Rawska",51.8025913733,20.4730897522],
        ["Łęczyca",52.0593733568,19.1998773193],
        ["Bełchatów",51.368271,19.358878],
        ["Skierniewice",51.9547169,20.1583303],
        ["Sieradz",51.5975081591,18.7315719893],
        ["Łódź Ruda",51.704577,19.441447],
        ["Ksawerów",51.682973,19.402278],
        ["Sulejów",51.354687,19.885196],
        ["Żychlin",52.2429379542,19.6311950684]
    ],
    "Lubelskie" =>
    [
        ["Lublin - Abramowice/Świdnik",51.2082814924,22.5878047943],
        ["Lublin - Kalinowszczyzna",51.2512791376,22.5967311859],
        ["Włodawa i okolice",51.55,23.55],
        ["Gmina Gościeradów",50.858193428329,22.0143699646],
        ["Krasnystaw i okolice",50.9945702394,23.1729125977],
        ["Nałeczów i okolice",51.2873884148,22.2190576172],
        ["Hrubieszów południe",50.8053112345,23.8944726562],
        ["Terespol i okolice",52.072437112494,23.608503341675],
        ["Lublin - Czechów",51.277451,22.554776],
        ["Lublin - Dziesiąta/ Kośminek",51.2198732532,22.5787337995],
        ["Niedrzwica Duża i okolice",51.115245,22.391346],
        ["Radzyń Podlaski i okolice",51.7832025,22.6218532],
        ["Bychawa i okolice",51.013484,22.532743],
        ["Kraśnik i okolice",50.923883,22.226154],
        ["Zamość",50.729066865,23.256855011],
        ["Łeczna i okolice",51.3009,22.88211],
        ["Gmina Milejów",51.232854,22.919331],
        ["Lublin - Sławinek",51.2595787059,22.5314813232],
        ["Gmina Goraj i okolice",50.721304,22.666543],
        ["Lublin - Wieniawa KUL",51.2534039443,22.5447588502],
        ["Gmina Poniatowa",51.192828,22.063635],
        ["Lublin - Konstantynów",51.240125936,22.5009255981],
        ["Parczew i okolice",51.640926490255,22.901945114136],
        ["Wąwolnica i okolice",51.2936998933,22.1462059021],
        ["Głusk i okolice",51.160500,22.624799],
        ["Tomaszów Lubelski",50.448973,23.41691],
        ["Cyców i okolice",51.3370384814,23.2086431984],
        ["Biała Podlaska i okolice",52.0387126,23.1445026],
        ["Miedzyrzec Podlaski i okolice",51.982333835,22.7697473145],
        ["Gmina Turobin",50.822315,22.746012],
        ["Lublin - Czuby",51.2262602226,22.5024705505],
        ["Chełm i okolice",51.1431232,23.4711986],
        ["Puławy i okolice",51.415679445,21.9687261924],
        ["Opole Lubelskie",51.148824,21.968762],
        ["Biłgoraj i okolice",50.54099,22.72198],
        ["Janów Lubelski",50.70669,22.41078],
        ["Hrubieszów północ",50.817384,23.886497],
        ["Józefów",50.482943,23.05331],
        ["Lubartów",51.4598694,22.6094606],
        ["Kazimierz Dolny i okolice",51.3224863682,21.9485192871],
        ["Dęblin",51.563134,21.863438]
    ],
    "MAZOWIECKIE II" =>
    [
        ["Warszawa - Wola",52.234233,20.957315],
        ["Warszawa - Bemowo",52.2372531903,20.9186553955],
        ["Sochaczew",52.210950395962,20.24093919754],
        ["Tłuszcz",52.428398002,21.4433115721],
        ["Błonie",52.199492,20.616873],
        ["Gmina Teresin",52.198069,20.415953],
        ["Pruszków",52.170073,20.813480],
        ["Warszawa - Praga Północ",52.2619807509,21.0297875977],
        ["Warszawa - Żoliborz",52.2662107138,20.9815692902],
        ["Warszawa - Żoliborz Marymont",52.270573,20.978911],
        ["Łomianki i okolice",52.3248486499,20.895652771],
        ["Stare Babice i okolice",52.2542884675,20.852508538],
        ["Warszawa - Targówek",52.2745915534,21.0678964234],
        ["Radzymin i okolice",52.4164508127,21.1807823181],
        ["Wołomin",52.348766,21.25808],
        ["Ząbki",52.294390026,21.1035161591],
        ["Marki",52.3213443,21.1035662],
        ["Warszawa - Białołęka",52.3280225349,20.9995751953],
        ["Warszawa - Bródno",52.2835186968,21.032190857],
        ["Warszawa - Rembertów",52.2637668314,21.1451440429],
        ["Nowy Dwór Mazowiecki",52.442654,20.685807],
        ["Serock",52.512,21.067916],
        ["Legionowo",52.406424984081,20.939150390625],
        ["Warszawa - Bielany",52.2761145463,20.9581189728],
        ["Ożarów Mazowiecki",52.21128,20.797142],
        ["Wegrów",52.399157,22.016426],
        ["Łochów i okolice",52.5308431473,21.6832351685],
        ["Chorzele",53.259186,20.894321],
        ["Raciąż",52.7815,20.11774],
        ["Glinojeck",52.8181181025,20.2955245972],
        ["Pułtusk",52.6953470077,21.0874658203],
        ["Płońsk",52.6211017047,20.3603082275],
        ["Ostrów Mazowiecka",52.8024372,21.8950416],
        ["Przasnysz",53.0131308459,20.8767700195],
        ["Ciechanów",52.8814838,20.6197948],
        ["Winnica",52.643167596983,20.940456390381],
        ["Sierpc",52.8565122705,19.6647363282],
        ["Wyszogród",52.3833333,20.2],
        ["Płock Centrum",52.5777073816,19.6389411314],
        ["Drobin",52.73824,19.992318],
        ["Jednorożec",53.1389448958,21.0515213013],
        ["Ostrołęka Południe",53.0478179591,21.6485595703],
        ["Rzekuń",53.055068,21.63934],
        ["Ostrołęka Północ",53.092258,21.558774],
        ["Goworowo",52.901781,21.551120],
        ["Wyszków",52.5925479252,21.4615942383],
        ["Myszyniec",53.380720,21.348304],
        ["Opinogóra-Regimin",52.9072455963,20.7143783569],
        ["Mława",53.1077533505,20.3815942382],
        ["Maków Mazowiecki",52.8650364946,21.100230217],
        ["Żuromin",53.0660775,19.9089047],
        ["Grudusk i Czernice Borowe",53.058830,20.624620],
        ["Gołymin",52.809137,20.885409],
        ["Strzegowo",0,0],
        ["Nasielsk",52.590858,20.805242],
        ["gmina Kadzidło",0,0],
        ["Gmina Długosiodło",0,0],
        ["Sokołów Podlaski",52.4131267538,22.2520166016],
        ["Gostynin",0,0],
        ["Gąbin",0,0],
        ["Różan",52.8865348742,21.3911562538],
        ["Gmina Leszno",0,0],
        ["Somianka",52.5660427869,21.3003259277]
    ],
    "MAZOWIECKIE I" =>
    [
        ["Dębe Wielkie i okolice",0,0],
        ["Warszawa - Stegny",52.1791161433,21.0521650315],
        ["Otwock",52.1053186,21.2616248],
        ["Warszawa - Włochy",52.1803708641,20.9465758754],
        ["Mińsk Mazowiecki",52.1792836,21.5721057],
        ["Józefów",0,0],
        ["Warszawa - Wilanów",52.1531043984,21.1117559052],
        ["Warszawa - Ochota",52.2022632828,20.9652429199],
        ["Warszawa - Ursus",52.1969411,20.873191],
        ["Brwinów",52.141439153552,20.70548850361],
        ["Grodzisk Mazowiecki",52.1044383,20.6350923],
        ["Żyrardów",52.048652,20.445988],
        ["Warszawa - Grochów",52.2454441291,21.0932528699],
        ["Warszawa - Saska Kępa i Gocław",52.2330564399,21.0603618622],
        ["Wiązowna",52.1703104,21.2915202],
        ["Sulejówek i Halinów",52.2258018582,21.3468461609],
        ["Warszawa - Śródmieście",52.2343398678,21.0057550048],
        ["Warszawa - Powiśle",52.2374554412,21.0304248059],
        ["Stanisławów",52.291307,21.553264],
        ["Warszawa - Mokotów Dolny",52.182231139,21.0680186475],
        ["Warszawa - Mokotów Górny",52.1966869561,21.0340791321],
        ["Warszawa - Służew",52.1667560315,21.0228717054],
        ["Warszawa - Ursynów",52.1358327294,21.0455804443],
        ["Konstancin-Jeziorna",52.0938717,21.117722],
        ["Góra Kalwaria",51.9764216622,21.2049865723],
        ["Piaseczno",52.0811536,21.0238602],
        ["Warszawa - Wawer",52.1622713211,21.187286911],
        ["Mszczonów",51.982047,20.5216182],
        ["Milanówek",52.119376,20.670647],
        ["Gmina Lesznowola",52.0866792565,20.9401130676],
        ["Piastów",52.185002,20.839538],
        ["Michałowice i Nadarzyn",52.1737477332,20.881472168],
        ["Podkowa Leśna",52.1199928,20.7265083],
        ["Przysucha i okolice",51.3512006307,20.657043457],
        ["Szydłowiec i okolice",51.2279908,20.8611466],
        ["Radom Północ",51.4257420802,21.1502232048],
        ["Wierzbica i okolice",51.249513794093,21.077179981445],
        ["Radom Południe",51.3939414053,21.1536564323],
        ["Lipsko",51.159015,21.649835],
        ["Zwoleń",51.355799,21.586799],
        ["Mrozy",52.1633806337,21.8015771485],
        ["Mordy",52.212126,22.517806],
        ["Garwolin i okolice",0,0],
        ["Pionki i okolice",51.4750972504,21.4513879394],
        ["Siedlce i okolice",52.1688782453,22.2857666015],
        ["Gmina Górzno",0,0],
        ["Celestynów",0,0],
        ["Zbuczyn",0,0],
        ["Łosice",52.212478,22.718255],
        ["Łaskarzew",0,0],
        ["Kozienice",51.5488265828,21.5580432551],
        ["Iłża",0,0],
        ["Grójec",51.8592354784,20.8594995117],
        ["Nowe Miasto nad Pilicą",0,0],
        ["Mogielnica",0,0],
        ["Żelechów",0,0],
        ["Warka",51.784967,21.190953],
        ["Białobrzegi",51.646972,20.955136],
        ["Zakroczym",0,0]
    ],
    "Małopolska" =>
    [
        ["Kraków - Plac Centralny",50.0719444,20.0372222],
        ["Kraków - Wzgórza Krzesławickie",50.0930734582,20.057657504],
        ["Kraków - Mistrzejowice",50.0981209,20.0067389],
        ["Kraków - Czyżyny",50.0660878913,20.0125222778],
        ["Kraków - Kozłówek",50.0192477,19.9814137],
        ["Kraków - Mogiła",50.0605515,20.0519583],
        ["Kraków - Podgórze",50.0439987592,19.9515737371],
        ["Kraków - Płaszów",50.0431749665,19.9865963386],
        ["Kraków - Prokocim",50.0182916,19.9869255],
        ["Kraków - Bieżanów",50.0194507,20.0250691],
        ["Liszki",50.0387484,19.7681904],
        ["Skała i okolice",0,0],
        ["Oświęcim I",50.0343982,19.2097782],
        ["Brzeszcze i okolice",49.9813922154,19.1526704407],
        ["Wadowice i okolice",49.8827856,19.4939579],
        ["Andrychów",49.8548934,19.3412842],
        ["Kalwaria Zebrzydowska",49.867336112326,19.676673978638],
        ["Ochojno",49.959325,19.964024],
        ["Kraków - Dębniki",50.0412463156,19.9182017448],
        ["Kraków - Ruczaj",50.0202397666,19.9033635851],
        ["Kraków - Borek Fałęcki - Łagiewniki",50.0110307,19.9150684],
        ["Kraków - Podgórze Duchackie",50.0212044581,19.9581320105],
        ["Olkusz i okolice",50.2813157,19.5656869],
        ["Trzebinia",50.1544660609,19.4633102417],
        ["Alwernia i okolice",50.05936548,19.5387917545],
        ["Bukowno",50.266017,19.444659],
        ["Brzeźnica",0,0],
        ["Krzeszowice",50.14192,19.63231],
        ["Kraków - Prądnik Biały",50.0926876,19.9241497],
        ["Kęty",0,0],
        ["Kraków - Krowodrza",50.0711510675,19.9173424183],
        ["Kraków - Bronowice",50.083426,19.8728125],
        ["Chrzanów",50.1260349,19.4307316],
        ["Zielonki",50.117925,19.921199],
        ["Kraków - Kazimierz",50.0505265,19.9426156],
        ["Skawina",49.9751815,19.8288749],
        ["Kraków - Stare Miasto",50.0605443,19.9417183],
        ["Kraków - Prądnik Czerwony",50.0858883,19.9711531],
        ["Kraków - Grzegórzki",50.0635913,19.9704543],
        ["Kraków - Olsza",50.0763458,19.9637033],
        ["Michałowice/Węgrzce",50.161176,19.979161],
        ["Libiąż",50.1017761827,19.3118005371],
        ["Oświęcim II",0,0],
        ["Klucze",0,0],
        ["Kocmyrzów - Luborzyca",0,0],
        ["Kraków - Zwierzyniec",50.0581094,19.8642065],
        ["Kraków - Swoszowice",49.9821501,19.9523717],
        ["Zabierzów",50.1061095502,19.8279862976],
        ["Wolbrom",50.37939,19.7584],
        ["Chełmek",0,0]
    ],
    "Małopolskie II" =>
    [
        ["Tarnów Zachód",0,0],
        ["Brzesko i okolice",49.947685259858,20.593872070312],
        ["Zakliczyn i okolice",0,0],
        ["Żabno i okolice",0,0],
        ["Gródek nad Dunajcem",49.7472513146,20.7318612313],
        ["Gorlice i okolice",49.632061941287,21.176147460938],
        ["Miechów",50.3568703,20.0274126],
        ["Niepołomice",50.0406662,20.2225326],
        ["Gdów",49.9079547,20.1980129],
        ["Wieliczka",49.9870165431,20.0684838867],
        ["Bochnia",49.9684577,20.4303285],
        ["Muszyna",0,0],
        ["Sułkowice",0,0],
        ["Krynica Zdrój",49.421651,20.956891],
        ["Proszowice",50.1921916,20.2890751],
        ["Zakopane",49.299181,19.9495621],
        ["Rabka-Zdrój i okolice",49.6090128,19.9671769],
        ["Nowy Targ",49.4878249,20.0419769],
        ["Limanowa",49.70587,20.42228],
        ["Łącko i okolice",49.5498507951,20.4358392333],
        ["Dobczyce",49.8811735,20.0890793],
        ["Nowy Sącz",49.6142692551,20.7229614258],
        ["Tarnów Wschód",50.011915,20.985489],
        ["Tuchów",49.894897,21.055287],
        ["Myślenice",49.834439500479,19.937438964844],
        ["Maków Podhalański",0,0],
        ["Słomniki",0,0],
        ["Mszana Dolna",49.67403,20.07982],
        ["Grybów",49.624435,20.947635],
        ["Sucha Beskidzka",49.868,19.67676],
        ["Bukowina Tatrzańska",49.34257,20.107508],
        ["Dąbrowa Tarnowska",50.17462,20.98638],
        ["Piwniczna Zdrój",0,0]
    ],
    "OPOLSKIE" =>
    [
        ["Tarnów Opolski",50.5723356014,18.085899353],
        ["Krapkowice",50.4734204451,17.9686779785],
        ["Ozimek",50.6771965,18.2302946],
        ["Kluczbork",50.977056766,18.2114296532],
        ["Zawadzkie",50.60435,18.48514],
        ["Opole - Centrum",50.6682054296,17.9268365478],
        ["Opole - Nowa Wieś Królewska",50.654337809,17.9458987712],
        ["Opole - Malinka/AK",50.6736380831,17.9586339495],
        ["Opole - Zaodrze",50.6735363627,17.900057373],
        ["Namysłów",51.0714169652,17.722902832],
        ["Nysa",50.4803193009,17.3357659096],
        ["Brzeg",50.8608509,17.4668311],
        ["Głogówek",0,0],
        ["Strzelce Opolskie",50.5059376196,18.2884597779],
        ["Prudnik",50.3145858113,17.5773339844],
        ["Grodków",50.69625,17.38516],
        ["Zdzieszowice",0,0],
        ["Głubczyce - Powiat",52.0302334198,19.2582421875],
        ["Kędzierzyn-Koźle",50.3519670467,18.215675354],
        ["Olesno",50.872226936,18.4222731006],
        ["Praszka",0,0],
        ["Głuchołazy​",0,0],
        ["Wołczyn",51.019144,18.051531],
        ["Otmuchów",0,0],
        ["Lewin Brzeski",0,0],
        ["Dobrodzień",0,0]
    ],
    "Podkarpacke" =>
    [
        ["Dukla i okolice",49.5555137,21.6832308],
        ["Jasło i okolice",49.7445663,21.4722875],
        ["Strzyżów i okolice",49.8748588765,21.7967706298],
        ["Ropczyce",50.05228,21.60887],
        ["Sokołów Małopolski",50.2309556662,22.1237182617],
        ["Łańcut i okolice",50.0691731135,22.2245507812],
        ["Rzeszów Południe",50.0269315649,22.019777298],
        ["Rzeszów Wschód",50.040604336193,22.024841308646],
        ["Rzeszów Północ",50.052848219126,22.000643391602],
        ["Rzeszów Zachód",50.040383838475,21.971626281786],
        ["Sanok",49.551943677795,22.204055786133],
        ["Gmina Bircza-Dubiecko",49.693823,22.48599],
        ["Dynów i okolice",49.815643,22.233953],
        ["Brzozów",49.6921984041,22.0322900391],
        ["Nisko i okolice",0,0],
        ["Stalowa Wola i okolice",50.5826005,22.053586],
        ["Tarnobrzeg i okolice",50.5729079,21.6790698],
        ["Jarosław i okolice",50.0132827619,22.68940979],
        ["Łukawiec i okolice",0,0],
        ["Przeworsk",0,0],
        ["Przemyśl",49.7838623,22.7677908],
        ["Mielec i okolice",50.287063,21.4238101],
        ["Leżajsk",50.261908,22.421109],
        ["Lesko",0,0],
        ["Ustrzyki Dolne",49.446700296997,22.598876953113],
        ["Krosno",49.6824761,21.7660531],
        ["Nowa Dęba",50.430376,21.750251],
        ["Kolbuszowa",50.242068073587,21.779604492187]
    ],
    "Podlaskie" =>
    [
        ["Białystok - Piaski",53.1207357391,23.1549983597],
        ["Powiat augustowski",53.844142448552,22.978487548853],
        ["Gmina Drohiczyn",52.400083,22.656095],
        ["Gmina Jaświły",53.4791416,22.949318],
        ["Białystok - Centrum",53.1322404,23.1548654],
        ["Białystok - Nowe Miasto",53.1098211,23.1186738],
        ["Powiat grajewski",53.6471559,22.455217],
        ["Supraśl i Ogrodniczki",53.2049014,23.3393564],
        ["Łomża i okolice",53.1778223544,22.0592408753],
        ["Białystok - Bacieczki",53.150431,23.099881],
        ["Białystok - Piasta",53.1347565,23.1850845],
        ["Gmina Wasilków",53.1986,23.20779],
        ["Krynki i Szudziałowo",53.2706755604,23.7708764648],
        ["Białystok - Mickiewicza",53.1161904,23.1707289],
        ["Białystok - Przydworcowe",53.1291824896,23.1364160156],
        ["Gmina Choroszcz",53.14292,22.98815],
        ["Powiat suwalski",54.1115218,22.9307881],
        ["Sokółka i okolice",53.4061597,23.5030235],
        ["Mońki i okolice",53.405373,22.796969],
        ["Białystok - Antoniuk",53.1402744,23.1364927],
        ["Białystok - Dojlidy",53.10644,23.178449],
        ["Powiat zambrowski",52.985676527542,22.235537109375],
        ["Siemiatycze i okolice",52.4265272386,22.8617578125],
        ["Gmina Goniądz",53.4898933,22.7360061],
        ["Michałowo",53.035036,23.604816],
        ["Dąbrowa Białostocka",53.6530313356,23.3446617177],
        ["Wysokie Mazowieckie",52.9148,22.51003],
        ["Bielsk Podlaski",52.7684335,23.1853959],
        ["Sejny",54.108159,23.347434],
        ["Ciechanowiec",52.6782617,22.4981661],
        ["Hajnówka",52.745548,23.580275],
        ["Łapy",52.990223365565,22.882357177722]
    ],
    "Pomorskie" =>
    [
        ["Kartuzy",54.334267977198,18.193766772461],
        ["Kościerzyna",54.119621710438,17.976961669921],
        ["Bytów i okolice",54.1706219,17.4916088],
        ["Miastko i okolice",54.002929,16.982555],
        ["Słupsk",54.5167935565,17.1507053004],
        ["Starogard Gdański i okolice",53.965614,18.5162736],
        ["Kwidzyn",53.7263529,18.9323043],
        ["Gmina Czersk",53.795755,17.976689],
        ["Gdańsk Chełm",54.3381020218,18.6095993629],
        ["Gdańsk Wrzeszcz",54.3734907605,18.6113763461],
        ["Gdańsk Żabianka",54.419966,18.575306],
        ["Gdańsk Brzeźno",54.408053,18.63248],
        ["Gdynia Główna",54.5268175684,18.5220028994],
        ["Gdynia Witomino",54.497964,18.508809],
        ["Gdynia Wzgórze Św. Maksymiliana",54.4893862457,18.5461620853],
        ["Sopot",54.441581,18.5600956],
        ["Puck i okolice",54.718840905844,18.410007191016],
        ["Wejherowo",54.601131,18.232756],
        ["Rumia",54.568394853,18.3881657228],
        ["Ustka",54.5313291152,16.860517709],
        ["Tczew",54.09,18.781],
        ["Malbork",54.037576,19.038483],
        ["Gmina Stegna",54.3262973,19.1122337],
        ["Chojnice",53.6944002,17.5569252],
        ["Gdańsk Oliwa",54.4013658,18.5394502],
        ["Gdynia Chylonia",0,0],
        ["Lębork",54.545401,17.753395],
        ["Nowy Dwór Gdański",54.208988,19.117034],
        ["Sierakowice",54.34653,17.891493],
        ["Sztum",0,0],
        ["Gniew",53.854436677702,18.8224],
        ["Kolbudy",54.272633,18.471461],
        ["Gdynia Chwarzno-Wiczlino",0,0],
        ["Władysławowo",0,0],
        ["Człuchów",53.667899,17.358777]
    ],
    "Śląskie" =>
    [
        ["Częstochowa Południe – Konopiska",50.778502641,19.1000060365],
        ["Częstochowa Centrum",50.8086740769,19.1164498901],
        ["Częstochowa Północ",50.8214991914,19.1230344773],
        ["Lubliniec",50.6710200339,18.6652214643],
        ["Tarnowskie Góry Centrum",50.437390702988,18.845844268799],
        ["Tarnowskie Góry i okolice",50.467689432234,18.905306396484],
        ["Miasteczko Śląskie",0,0],
        ["Pyskowice",50.3931988571,18.6403656006],
        ["Zabrze Północ",50.3426121029,18.7905693054],
        ["Zabrze Południe",50.2975213294,18.8015114467],
        ["Ruda Śląska Północ",50.2554591488,18.8624267536],
        ["Ruda Śląska Południe",50.243033329,18.8458442688],
        ["Świętochłowice",50.293633283269,18.917180284912],
        ["Chorzów Południe",50.2893392533,18.9658355713],
        ["Chorzów Północ",50.301649111579,18.954058227539],
        ["Mysłowice Centrum",50.2171403068,19.1607385254],
        ["Mysłowice Południe",50.2081095405,19.1666793823],
        ["Wojkowice",50.3647682,19.0244312809],
        ["Siemianowice Śląskie Wschód",50.3077698997,19.025580273],
        ["Siemianowice Śląskie Zachód",0,0],
        ["Katowice Centrum",50.2592650118,19.0179377174],
        ["Katowice Południe",50.252161209,19.0327078916],
        ["Katowice Północ – Zachód",50.2608148613,19.0492630005],
        ["Katowice Wschód",50.261599806,19.0625769712],
        ["Katowice Zachód",50.2569965292,19.0000634765],
        ["Katowice Południe – Zachód",0,0],
        ["Katowice Północ - Wschód",50.264014030475,19.069786749032],
        ["Gliwice Centrum",50.29488,18.614597],
        ["Gliwice Północ",50.2944923,18.6713802],
        ["Gliwice Południe",50.2831969821,18.6729812622],
        ["Knurów",50.2158493152,18.6745935059],
        ["Racibórz",50.0797495118,18.2200341797],
        ["Rybnik Północ",50.1179364694,18.5346221924],
        ["Rybnik Południe",50.0861382887,18.589964447],
        ["Żory",50.0401911858,18.6924462891],
        ["Czerwionka –Leszczyny",50.1486641835,18.6783700562],
        ["Wodzisław Śląski",50.00397535039,18.471910998779],
        ["Pawłowice",49.961113,18.719002],
        ["Jastrzębie Zdrój Wschód",49.944587231458,18.607388076782],
        ["Cieszyn",49.7497638,18.6354709],
        ["Ustroń – Wisła",49.647487,18.869185],
        ["Bielsko Biała Centrum",0,0],
        ["Bielsko Biała Południe",0,0],
        ["Bielsko Biała Północ",49.8167208436,19.0969848633],
        ["Milówka – Węgierska Górka",49.558994,19.088355],
        ["Gmina Jeleśnia",49.6400665303,19.3266677856],
        ["Żywiec",49.677846887079,19.18556191504],
        ["Łodygowice",49.7260791,19.1356685],
        ["Jaworzynka, Koniaków, Istebna",0,0],
        ["Międzybrodzie Bielskie",0,0],
        ["Jastrzębie Zdrój Zachód",0,0],
        ["Kuźnia Raciboska",50.199539422473,18.31111907959],
        ["Skoczów",49.8003253076,18.7938308716]
    ],
    "Śląskie II" =>
    [
        ["Czechowice – Dziedzice",49.9016056,18.9917676],
        ["Bieruń",50.0904386538,19.0975671386],
        ["Pszczyna Centrum",49.979425,18.93661],
        ["Pszczyna Powiat",49.995539,18.93043],
        ["Imielin, Chełm Śląski, Lędziny",50.139264832,19.1831320524],
        ["Sosnowiec Wschód",50.260814861345,19.268860816956],
        ["Sosnowiec Centrum",50.2862638,19.1040791],
        ["Dąbrowa Górnicza",50.3152231324,19.2351729635],
        ["Jaworzno",50.1976941954,19.2712884521],
        ["Mikołów, Łaziska",50.1781389487,18.9017437635],
        ["Tychy Północ",50.1312531952,19.0223121643],
        ["Tychy Południe",50.1218007,19.0200022],
        ["Koziegłowy, Poraj",50.677459,19.213889],
        ["Myszków",50.570694,19.314906],
        ["Szczekociny",50.626696,19.822501],
        ["Bytom Północ",50.3500711,18.8884162],
        ["Bytom Południe",50.3281765173,18.9080529785],
        ["Zawiercie",50.4834209375,19.4292169189],
        ["Piekary Śląskie",50.379183,18.929247],
        ["Siewierz, Mierzęcice",50.444674,19.128235],
        ["Czeladź",50.2974901,19.0738171],
        ["Będzin",50.3255999,19.1254121],
        ["Poraj/Koziegłowy",0,0]
    ],
    "Świętokrzyskie" =>
    [
        ["Kielce Północ",50.8892024789,20.6446609541],
        ["Kielce Wschód",50.8714520799,20.6570971012],
        ["Kielce Zachód",50.855882,20.557963],
        ["Gmina Łopuszno",0,0],
        ["Gmina Słupia Konecka",51.0124586634,20.1472091675],
        ["Jędrzejów",50.627931898827,20.306749877929],
        ["Miasto i Gmina Małogoszcz",50.8121157,20.2650979],
        ["Gmina Radków",50.7136963,19.9872927],
        ["Suchedniów",0,0],
        ["Wąchock",0,0],
        ["Sandomierz",50.655903241242,21.757631835937],
        ["Kazimierza Wielka",50.26628,20.493206],
        ["Busko- Zdrój",50.4684315856,20.71849823],
        ["Pinczów",50.52034,20.5264571],
        ["Gmina Staszów",50.5575061743,21.1709976196],
        ["Starachowice",51.0368289,21.0709769],
        ["Miasto i Gmina Opatów",50.8018537,21.427194],
        ["Ożarów i Tarłów",50.891313,21.666088],
        ["Nowa Słupia",50.865755,21.090259],
        ["Gmina Morawica",50.7464441,20.617291],
        ["Skarżysko -Kamienna Południe",51.095760498,20.8479309082],
        ["Gmina Raków",50.673505,21.046556],
        ["Gmina Zagnańsk",50.9692381427,20.6007385254],
        ["Sędziszów",50.568019,20.054549],
        ["Łagów",0,0],
        ["Włoszczowa",50.85237,19.96772],
        ["Piekoszów",0,0],
        ["Sitkówka - Nowiny",50.824904,20.530951],
        ["Ćmielów",0,0]
    ],
    "Warminsko-Mazurskie" =>
    [
        ["Pisz i okolice",53.673934358354,21.821594238281],
        ["Gołdap",54.3133189145,22.2847366333],
        ["Ełk",53.8330807127,22.4176025391],
        ["Mrągowo",53.8641596,21.3048734],
        ["Lidzbark",53.262518,19.825931],
        ["Barczewo",53.810382427311,20.711975097656],
        ["Działdowo",53.244001,20.188941],
        ["Iława",53.5959811,19.5684104],
        ["Gmina Purda",0,0],
        ["Lubawa",53.504172,19.751143],
        ["Lidzbark Warmiński",54.1249116,20.5859507],
        ["Biskupiec",53.863215,20.954681],
        ["Elbląg Północ",54.2054783404,19.415910244],
        ["Kętrzyn",54.07657,21.37504],
        ["Nidzica",53.3546498287,20.4242706299],
        ["Morąg",53.9160398,19.9279338],
        ["Elbląg Południe",54.1404382067,19.3969445801],
        ["Braniewo",54.380418,19.819348],
        ["Ostróda",53.6963007,19.9647952],
        ["Olsztyn Jaroty I",53.7747701327,20.4749694586],
        ["Olsztyn Jaroty II",53.7590431859,20.4800334693],
        ["Olsztyn Północ",53.7916478647,20.5010705566],
        ["Szczytno",53.56354,20.99519],
        ["Bartoszyce",54.252389302768,20.808362960815],
        ["Węgorzewo",54.2138610006,21.7337036133],
        ["Olecko",54.033509,22.505133],
        ["Susz",53.6817556916,19.3334298706],
        ["Dobre Miasto",53.9851652387,20.3906249999],
        ["Pasłęk",54.061978,19.663814],
        ["Biała Piska",0,0],
        ["Orneta",54.1147921559,20.1350885009],
        ["Olsztynek",53.584672,20.280171]
    ],
    "Wielkopolskie" =>
    [
        ["Poznań - Łazarz",52.389091283,16.9131518036],
        ["Kępno",51.278136,17.989059],
        ["Jarocin",51.9724492,17.5019414],
        ["Ostrów Wielkopolski",51.6347694028,17.7922540283],
        ["Krotoszyn",51.696669,17.439078],
        ["Ostrzeszów",51.4341332713,17.9234033203],
        ["Poznan - Świerczewo",52.370544115334,16.895470681787],
        ["Grodzisk",52.2109727681,16.3861083984],
        ["gmina Wolsztyn",52.1139115617,16.1161523437],
        ["Nowy Tomysl",52.318237,16.127692],
        ["Zbąszyń",52.2460078922,15.9245782471],
        ["Stęszew",52.2837287256,16.6980844116],
        ["Poznań - Grunwald",52.378474693,16.8657302857],
        ["Poznań - Ogrody",52.4141549992,16.8847514069],
        ["Przeźmierowo",52.4278636493,16.7862510576],
        ["Buk",52.3494188215,16.5102868652],
        ["Międzychód",52.59855,15.89254],
        ["Oborniki",52.6437147026,16.8041711426],
        ["Poznań - Strzeszyn",52.458914,16.85211],
        ["Wronki",52.7103395,16.3803948],
        ["Pleszew",51.8963842682,17.7872758484],
        ["Turek",52.0156000558,18.4968919918],
        ["Słupca",52.2880293842,17.8725915528],
        ["Kalisz",51.760828581216,18.108797607422],
        ["Wierzbinek",0,0],
        ["Konin",52.2230334,18.2510729],
        ["Zagórów",0,0],
        ["Września",52.3182602009,17.5615411377],
        ["Chodzież",52.995267,16.9198184],
        ["Piła",53.1511156835,16.7379527664],
        ["Złotów",53.3661235611,17.0294952393],
        ["Poznań - Os. Warszawskie",52.4127207759,16.9867599678],
        ["Poznań - Wilda",52.3777186,16.9170698],
        ["Poznań - Stare Miasto",52.4081526121,16.9306397438],
        ["Poznań - Winogrady",52.435408,16.936358],
        ["Poznań - Rataje",0,0],
        ["Poznań - Piątkowo",52.4623653543,16.9093752533],
        ["Zaniemyśl",52.1549783057,17.162361145],
        ["Kostrzyn Wielkopolski",52.3982558254,17.2285180664],
        ["Gmina Czerwonak",52.461866903001,16.983833312988],
        ["Luboń",52.3462470503,16.8776422119],
        ["Rogoźno",0,0],
        ["Kórnik",52.2467217813,17.0957565308],
        ["Poznań - Starołęka",52.3753895836,16.9479560852],
        ["Rawicz",51.609104,16.859502],
        ["Gostyń",51.8786,17.01215],
        ["Kościan",52.0852291469,16.6393762207],
        ["Poznań - Naramowice",0,0],
        ["Kołaczkowo",52.2015315481,17.629519043],
        ["Śrem",52.089058,17.016127],
        ["Wągrowiec",52.80507072,17.190065918],
        ["Gniezno",52.524394544501,17.603426513672],
        ["Murowana Goślina",52.574621,17.00839],
        ["Koło",52.1998481748,18.6399179077],
        ["Środa Wlkp.",52.2234095999,17.2710900879],
        ["Mosina",52.2454069,16.8470545],
        ["Kalisz 2",0,0],
        ["Poznań-Rataje 2",0,0],
        ["Czarnków-Trzcianka",52.90528,16.56567],
        ["Szamotuły",52.6116547,16.5779047],
        ["Wyrzysk",0,0],
        ["Kłodawa",0,0]
    ],
    "Zachodniopomorskie" =>
    [
        ["Świnoujście i okolice",53.768830228,14.2704492187],
        ["Świnoujście Centrum",53.912630137192,14.246864318835],
        ["Koszalin i okolice",54.1913695456,16.174621582],
        ["Koszalin Centrum",54.18655,16.186337],
        ["Gmina Karlino",0,0],
        ["Powiat Kołobrzeski",54.176982,15.58268],
        ["Szczecin - Śródmieście Zachód",53.4285438,14.5528116],
        ["Szczecin - Śródmieście Północ",53.4400447053,14.5420188841],
        ["Szczecin Turzyn - Gumieńce",53.428618,14.531401],
        ["Szczecin Centrum",0,0],
        ["Powiat Szczecinecki",0,0],
        ["Myślibórz i okolice",52.9223583684,14.8663902283],
        ["Powiat Choszczeński",53.1648869176,15.4179382324],
        ["Goleniów i okolice",53.564582,14.827954],
        ["Nowogard i okolice",53.6711287455,15.1206654344],
        ["Gmina Przelewice",0,0],
        ["Kamień Pomorski",53.9645808647,14.785740927],
        ["Świdwin",53.77564,15.7742],
        ["Gryfino",53.2531171671,14.4898324585],
        ["Gryfice",53.917521,15.199122],
        ["Pyrzyce",53.1449430724,14.8898034668],
        ["Wałcz",53.274564,16.475237],
        ["Kalisz Pomorski",53.305238,15.904269],
        ["Szczecin",0,0],
        ["Drawsko Pomorskie",53.533196,15.813458],
        ["Szczecinek",53.7062846277,16.6998010254],
        ["Darłowo",0,0]
    ]
];

$WojewodztwaSZP = [
    "Dolnośląskie" => "dolnośląskie",
    "Kujawsko-pomorskie" => "kujawsko-pomorskie",
    "Lubuskie" => "lubuskie",
    "Łódzkie" => "łódzkie",
    "Lubelskie" => "lubelskie",
    "MAZOWIECKIE II" => "mazowieckie",
    "MAZOWIECKIE I" => "mazowieckie",
    "Małopolska" => "małopolskie",
    "Małopolskie II" => "małopolskie",
    "OPOLSKIE" => "opolskie",
    "Podkarpacke" => "podkarpackie",
    "Podlaskie" => "podlaskie",
    "Pomorskie" => "pomorskie",
    "Śląskie" => "śląskie",
    "Śląskie II" => "śląskie",
    "Świętokrzyskie" => "świętokrzyskie",
    "Warminsko-Mazurskie" => "warmińsko-mazurskie",
    "Wielkopolskie" => "wielkopolskie",
    "Zachodniopomorskie" => "zachodniopomorskie"
];

$MiastaAP = [
    "dolnośląskie" =>
    [
        "Oleśnica" => ["SP nr 8 w Oleśnicy",0,0],
        "Oleśnica" => ["SP nr 2 w Oleśnicy",0,0],
        "Wrocław" => ["SP nr 12 we Wrocławiu",0,0],
        "Wrocław" => ["SP nr 19 we Wrocławiu",0,0],
        "Wrocław" => ["SP nr 47 we Wrocławiu",0,0],
        "Wrocław" => ["SP nr 76 we Wrocławiu",0,0],
        "Wrocław" => ["? we Wrocławiu",0,0],
        "Legnica" => ["? w Legnicy",0,0]
    ],
    "małopolskie" =>
    [
        "Kraków" => ["SP nr 3 w Krakowie",0,0],
        "Kraków" => ["SP nr 22 w Krakowie",0,0],
        "Kraków" => ["SP nr 24 w Krakowie",0,0],
        "Kraków" => ["SP nr 25 w Krakowie",0,0],
        "Kraków" => ["SP nr 31 w Krakowie",0,0],
        "Kraków" => ["SP nr 41 w Krakowie",0,0],
        "Kraków" => ["SP nr 47 w Krakowie",0,0],
        "Kraków" => ["SP nr 89 w Krakowie",0,0],
        "Kraków" => ["SP nr 101 w Krakowie",0,0],
        "Kraków" => ["SP nr 119 w Krakowie",0,0],
        "Kraków" => ["SP nr 148 w Krakowie",0,0],
        "Kraków" => ["SP nr 151 w Krakowie",0,0],
        "Kraków" => ["AM w Krakowie",0,0],
        "Kraków" => ["RDD4 w Krakowie",0,0],
        "Kraków" => ["SP nr 18 w Krakowie",0,0],
        "Kraków" => ["SP nr 1 w Krakowie",0,0],
        "Kraków" => ["SP nr 5 w Krakowie",0,0],
        "Kraków" => ["SP nr 11 w Krakowie",0,0],
        "Kraków" => ["SP nr 26 w Krakowie",0,0],
        "Kraków" => ["SP nr 36 w Krakowie",0,0],
        "Kraków" => ["SP nr 55 w Krakowie",0,0],
        "Kraków" => ["SP nr 91 w Krakowie",0,0],
        "Kraków" => ["SP nr 104 w Krakowie",0,0],
        "Kraków" => ["SP nr 159 w Krakowie",0,0],
        "Kraków" => ["SP nr 164 w Krakowie",0,0],
        "Kraków" => ["RDD2 w Krakowie",0,0],
        "Tarnów" => ["SP nr 17 w Tarnowie",0,0],
        "Olkusz" => ["SP nr 4 w Olkuszu",0,0]
    ],
    "zachodniopomorskie" =>
    [
        "Szczecin" => ["SP nr 61 w Szczecinie",0,0],
        "Szczecin" => ["SP nr 47 w Szczecinie",0,0],
        "Szczecin" => ["SP nr 35 w Szczecinie",0,0],
        "Szczecin" => ["SP nr 54 w Szczecinie",0,0],
        "Białogard" => ["SP nr 4 w Białogardzie",0,0]
    ],
    "świętokrzyskie" =>
    [
        "Kielce" => ["SP nr 1 w Kielcach",0,0],
        "Kielce" => ["SP nr 12 w Kielcach",0,0],
        "Kielce" => ["SP nr 19 w Kielcach",0,0],
        "Kielce" => ["SP nr 23 w Kielcach",0,0],
        "Kielce" => ["SP nr 33 w Kielcach",0,0],
        "Sandomierz" => ["SP nr 1 w Sandomierzu",0,0]
    ],
    "wielkopolskie" =>
    [
        "Poznań" => ["RDD w Poznianiu",0,0],
        "Poznań" => ["SP nr 11 w Poznianiu",0,0],
        "Poznań" => ["SP nr 34 w Poznianiu",0,0],
        "Poznań" => ["SP nr 40 w Poznianiu",0,0],
        "Poznań" => ["SP nr 45 w Poznianiu",0,0],
        "Poznań" => ["SP nr 5 w Poznianiu",0,0],
        "Poznań" => ["SP nr 51 w Poznianiu",0,0],
        "Poznań" => ["SP nr 82 w Poznianiu",0,0],
        "Poznań" => ["SP nr 85 w Poznianiu",0,0],
        "Poznań" => ["SP nr 88 w Poznianiu",0,0],
        "Poznań" => ["SP nr 46 w Poznianiu",0,0],
        "Poznań" => ["SP nr 87 w Poznianiu",0,0],
        "Wolsztyn" => ["SP nr 3 w Wolsztynie",0,0]
    ],
    "śląskie" =>
    [
        "Katowice" => ["SP nr 12 w Katowicach",0,0],
        "Katowice" => ["SP nr 2 w Katowicach",0,0],
        "Katowice" => ["SP nr 20 w Katowicach",0,0],
        "Katowice" => ["SP nr 22 w Katowicach",0,0],
        "Katowice" => ["SP nr 31 w Katowicach",0,0],
        "Katowice" => ["SP nr 37 w Katowicach",0,0],
        "Katowice" => ["SP nr 58 w Katowicach",0,0],
        "Mysłowice" => ["SP nr 10 w Mysłowicach",0,0],
        "Mysłowice" => ["SP nr 15 w Mysłowicach",0,0],
        "Mysłowice" => ["SP nr 3 w Mysłowicach",0,0],
        "Sosnowiec" => ["SP nr 6 w Sosnowcu",0,0],
        "Sosnowiec" => ["SP nr 10 w Sosnowcu",0,0],
        "Sosnowiec" => ["SP nr 3 w Sosnowcu",0,0],
        "Bielsko-Biała" => ["SP nr 4 w Bielsku-Białej",0,0],
        "Bielsko-Biała" => ["SP nr 18 w Bielsku-Białej",0,0],
        "Gliwice" => ["? w Gliwicach",0,0]
    ],
    "opolskie" =>
    [
        "Opole" => ["SP nr 2 w Opolu",0,0],
        "Opole" => ["SP nr 5 w Opolu",0,0],
        "Opole" => ["SP nr 8 w Opolu",0,0],
        "Opole" => ["SP nr 21 w Opolu",0,0],
        "Olesno" => ["? w Oleśnie",0,0]
    ],
    "mazowieckie" =>
    [
        "Warszawa" => ["SP nr 115 w Warszawie",0,0],
        "Warszawa" => ["SP nr 264 w Warszawie",0,0],
        "Warszawa" => ["SP nr 318 w Warszawie",0,0],
        "Warszawa" => ["SP nr 141 w Warszawie",0,0],
        "Warszawa" => ["SP nr 267 w Warszawie",0,0],
        "Warszawa" => ["SP nr 143 w Warszawie",0,0],
        "Warszawa" => ["SP nr 85 w Warszawie",0,0],
        "Warszawa" => ["SP nr 50 w Warszawie",0,0],
        "Warszawa" => ["SP nr 166 w Warszawie",0,0],
        "Warszawa" => ["SP nr 48 (ZS 60) w Warszawie",0,0],
        "Warszawa" => ["SP nr 157 w Warszawie",0,0],
        "Warszawa" => ["SP nr 73 w Warszawie",0,0],
        "Warszawa" => ["SP nr 30 w Warszawie",0,0],
        "Otwock" => ["? w Otwocku",0,0]
    ],
    "warmińsko-mazurskie" =>
    [
        "Olsztyn" => ["SP nr 10 w Olsztynie",0,0],
        "Olsztyn" => ["SP nr 15 w Olsztynie",0,0],
        "Olsztyn" => ["SP nr 33 w Olsztynie",0,0]
    ],
    "pomorskie" =>
    [
        "Gdynia" => ["SP nr 10 w Gdyni",0,0],
        "Sopot" => ["SP nr 1 w Sopocie",0,0],
        "Gdańsk" => ["SP nr 48 w Gdańsku",0,0],
        "Gdańsk" => ["SP nr 29 w Gdańsku",0,0],
        "Gdańsk" => ["SP nr 77 w Gdańsku",0,0],
        "Gdańsk" => ["SP nr 89 w Gdańsku",0,0],
        "Gdańsk" => ["RDD Ogniska Nadziei w Gdańsku",0,0],
        "Gdańsk" => ["SP nr 39 w Gdańsku",0,0],
        "Słupsk" => ["RDD CAPS w Słupsku",0,0]
    ],
    "lubuskie" =>
    [
        "Zielona Góra" => ["SP nr 1 w Zielonej Górze",0,0],
        "Zielona Góra" => ["SP nr 6 w Zielonej Górze",0,0],
        "Zielona Góra" => ["PSP nr 7 w Zielonej Górze",0,0],
        "Zielona Góra" => ["SP nr 10 w Zielonej Górze",0,0],
        "Zielona Góra" => ["SP nr 15 w Zielonej Górze",0,0],
        "Zielona Góra" => ["SP nr 17 w Zielonej Górze",0,0],
        "Zielona Góra" => ["SP nr 18 w Zielonej Górze",0,0],
        "Zielona Góra" => ["ZE1 w Zielonej Górze",0,0],
        "Zielona Góra" => ["SP nr 11 w Zielonej Górze",0,0],
        "Gorzów Wlkp" => ["SP nr 10 w Gorzowie Wielkopolskim",0,0],
        "Gorzów Wlkp" => ["SP nr 6 w Gorzowie Wielkopolskim",0,0]
    ],
    "lubelskie" =>
    [
        "Lublin" => ["SP nr 21 w Lublinie",0,0],
        "Lublin" => ["SP nr 3 w Lublinie",0,0],
        "Lublin" => ["SP nr 29 w Lublinie",0,0],
        "Lublin" => ["SP nr 24 w Lublinie",0,0],
        "Lublin" => ["SP nr 27 w Lublinie",0,0],
        "Lublin" => ["SP nr 46 w Lublinie",0,0],
        "Lublin" => ["SP nr 51 w Lublinie",0,0],
        "Biała Podlaska" => ["? w Białej Podlaskiej",0,0]
    ],
    "podkarpackie" =>
    [
        "Rzeszów" => ["SP nr 2 w Rzeszowie",0,0],
        "Rzeszów" => ["SP nr 3 w Rzeszowie",0,0],
        "Rzeszów" => ["SP nr 6 w Rzeszowie",0,0],
        "Rzeszów" => ["SP nr 8 w Rzeszowie",0,0],
        "Rzeszów" => ["SP nr 12 w Rzeszowie",0,0],
        "Rzeszów" => ["SP nr 15 w Rzeszowie",0,0],
        "Rzeszów" => ["SP nr 17 w Rzeszowie",0,0],
        "Rzeszów" => ["SP nr 19 w Rzeszowie",0,0],
        "Rzeszów" => ["SP nr 22 w Rzeszowie",0,0],
        "Rzeszów" => ["SP nr 25 w Rzeszowie",0,0],
        "Sanok" => ["MDK w Sanoku",0,0],
        "Sanok" => ["SP nr 3 w Sanoku",0,0],
        "Łańcut" => ["SP nr 2 w Łańcucie",0,0],
        "Przemyśl" => ["? w Przemyślu",0,0],
        "Stalowa Wola" => ["? w Stalowej Woli",0,0]
    ],
    "łódzkie" =>
    [
        "Łódź" => ["SP nr 35 w Łodzi",0,0],
        "Łódź" => ["SP nr 58 w Łodzi",0,0],
        "Łódź" => ["SP nr 41 w Łodzi",0,0],
        "Łódź" => ["SP nr 14 w Łodzi",0,0],
        "Łódź" => ["SP nr 64 w Łodzi",0,0],
        "Łódź" => ["SP nr 79 w Łodzi",0,0],
        "Łódź" => ["SP nr 111 w Łodzi",0,0],
        "Aleksandrów Łódzki" => ["SP nr 1 w Aleksandrowie Łódzkim",0,0],
        "Aleksandrów Łódzki" => ["SP nr 3 w Aleksandrowie Łódzkim",0,0],
        "Zgierz" => ["SP nr 5 w Zgierzu",0,0]
    ],
    "podlaskie" =>
    [
        "Białystok" => ["SP nr 2 w Białymstoku",0,0],
        "Białystok" => ["SP nr 7 w Białymstoku",0,0],
        "Białystok" => ["SP nr 12 w Białymstoku",0,0],
        "Białystok" => ["SP nr 19 w Białymstoku",0,0],
        "Białystok" => ["SP nr 29 w Białymstoku",0,0],
        "Białystok" => ["SP nr 44 w Białymstoku",0,0],
        "Białystok" => ["SP nr 50 w Białymstoku",0,0],
        "Białystok" => ["SP nr 4 w Białymstoku",0,0],
        "Białystok" => ["SP nr 16 w Białymstoku",0,0],
        "Białystok" => ["SP nr 26 w Białymstoku",0,0],
        "Białystok" => ["SP nr 6 w Białymstoku",0,0],
        "Suwałki" => ["SP nr 6 w Suwałkach",0,0],
        "Suwałki" => ["SP nr 4 w Suwałkach",0,0]
    ],
    "kujawsko-pomorskie" =>
    [
        "Toruń" => ["SP nr 1 w Toruniu",0,0],
        "Toruń" => ["SP nr 13 w Toruniu",0,0],
        "Toruń" => ["SP nr 2 w Toruniu",0,0],
        "Toruń" => ["SP nr 24 w Toruniu",0,0],
        "Toruń" => ["SP nr 31 w Toruniu",0,0],
        "Toruń" => ["SP nr 5 w Toruniu",0,0],
        "Toruń" => ["SP nr 6 w Toruniu",0,0],
        "Toruń" => ["SP nr 7 w Toruniu",0,0],
        "Bydgoszcz" => ["SP nr 14 w Bydgoszczy",0,0],
        "Bydgoszcz" => ["SP nr 37 w Bydgoszczy",0,0],
        "Bydgoszcz" => ["SP nr 62 w Bydgoszczy",0,0],
        "Bydgoszcz" => ["SP nr 63 w Bydgoszczy",0,0]
    ]
];

$administrativeDef = (new StructDefinition)
    ->networkName('administrative');


$emptyAdder = $wioStruct->structQuery(new StructDefinition);
$emptyAdder->add('Network','Szlachetna Paczka');
$emptyAdder->add('Network','Akademia Przyszłości');
$emptyAdder->add('FlagType','mapa_liderow_2016');
$emptyAdder->add('FlagType','mapa_liderow_2016_miasto_ap');

$szpId = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('Szlachetna Paczka')
    )->getId('Network');

$apId = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('Akademia Przyszłości')
    )->getId('Network');

$szpAdder = $wioStruct->structQuery((new StructDefinition)->networkId($szpId));
$szpAdder->add('NodeType','województwo');
$szpAdder->add('NodeType','rejon');

$szpWojId = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkId($szpId)
        ->nodeTypeName('województwo')
    )->getId('NodeType');

$szpRejonId = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkId($szpId)
        ->nodeTypeName('rejon')
    )->getId('NodeType');


$apAdder = $wioStruct->structQuery((new StructDefinition)->networkId($apId));
$apAdder->add('NodeType','województwo');
$apAdder->add('NodeType','miasto');
$apAdder->add('NodeType','kolegium');

$apWojId = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkId($apId)
        ->nodeTypeName('województwo')
    )->getId('NodeType');

$apMiastoId = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkId($apId)
        ->nodeTypeName('miasto')
    )->getId('NodeType');

$apKolegiumId = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkId($apId)
        ->nodeTypeName('kolegium')
    )->getId('NodeType');


$woj = $wioStruct->structQuery((new StructDefinition)->networkName('administrative')->nodeTypeName('state'))->get('Node');

$wojewodztwa = [];
foreach ($woj as $w){ $wojewodztwa[ $w->NodeName ]=(int)$w->NodeId; }

//tab_dump($wioStruct->structQuery((new StructDefinition)->networkName('administrative')->nodeTypeName('city'))->get('Node'));

$szpWojAdder = $wioStruct->structQuery((new StructDefinition)->nodeTypeId($szpWojId));
$szpRejonAdder = $wioStruct->structQuery((new StructDefinition)->nodeTypeId($szpRejonId));

foreach($RejonySZP as $wojNazwa => $wojData){

    $szpWojAdder->add('Node',$wojNazwa)
        ->add('LinkParent',$wojewodztwa[ $WojewodztwaSZP[ $wojNazwa ]])
        ->add('Flag','mapa_liderow_2016');

    $wojId = $szpWojAdder->getId('Node',$wojNazwa);

    foreach($wojData as $rejon){

        $szpRejonAdder->add('Node',$rejon[0],$rejon[1],$rejon[2])
            ->add('LinkParent',$wojId)
            ->add('Flag','mapa_liderow_2016');
    }
}



$mias = $wioStruct->structQuery((new StructDefinition)->networkName('administrative')->nodeTypeName('city'))->get('Node');

$miasta = [];
foreach ($mias as $m){ $miasta[ $m->NodeName ]=(int)$m->NodeId; }

$szpWojAdder = $wioStruct->structQuery((new StructDefinition)->nodeTypeId($szpWojId));
$szpRejonAdder = $wioStruct->structQuery((new StructDefinition)->nodeTypeId($szpRejonId));

$markedCities=[];
foreach($MiastaAP as $wojNazwa => $wojData){
    foreach($wojData as $miastoName=>$miastoData){
        if(!isset($markedCities[$miastoName])){
            $markedCities[$miastoName]=true;


            $cityId = $wioStruct->structQuery(
                (new StructDefinition)
                    ->networkName('administrative')
                    ->nodeTypeName('city')
                    ->nodeName( $miastoName )
                    ->linkParent($wojewodztwa[ $wojNazwa ])
                )->getId('Node');

            if($cityId){
                $wioStruct->structQuery(
                    (new StructDefinition)
                        ->nodeId($cityId)
                    )->add('Flag','mapa_liderow_2016_miasto_ap');
            }
        }
    }
}


tab_dump($wioStruct->structQuery((new StructDefinition)->networkName('administrative')->nodeTypeName('state'))->get('Node'));

// tab_dump($wioStruct->structQuery((new StructDefinition)->flagTypeName('mapa_liderow_2016_miasto_ap'))->get('Node'));

tab_dump($wioStruct->structQuery((new StructDefinition))->get('Node'));
