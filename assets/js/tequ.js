//skrypt testu

// KATEGORIE ODPOWIEDZI
//  sz - sporty zespołowe
//  si - sporty indywidualne
//  sl - sporty letnie
//  szi - sporty zimowe
//  sw - sporty walki
//  se - sporty ekstremalne
//  swo - sporty wodne
//  sr - sporty rekreacyjne
console.log(tequCategories[0].category);

const testCategories = {
    'sz': 0,
    'si': 0,
    'sl': 0,
    'szi': 0,
    'sw': 0,
    'se': 0,
    'swo': 0,
    'sr': 0
};

const summaries = {
    'sz': 'Wygląda na to, że lubisz być częścią zespołu i mieć w nim jakąś funkcję, ważny jest dla Ciebie wspólny cel, ale także rywalizacja. Spróbuj swoich sił w sportach zespołowych – do najpopularniejszych należą piłka nożna, koszykówka, siatkówka, czy piłka ręczna. Warto sprawdzić także takie dyscypliny, jak baseball (lub jego polską wersję, czyli palanta), rugby, hokej na lodzie i inne.',
    'si': 'Być może nie jesteś typowym introwertykiem, ale lubisz spędzać czas ze sobą – również jeśli chodzi o aktywność fizyczną. A może po prostu lubisz być sam sobie „sterem, żaglem, okrętem i żeglarzem”? Spróbuj dyscypliny dla siebie! Może kolarstwo, badminton, tenis ziemny i stołowy, bieganie, lekkoatletyka, pływanie, siłownia i fitness albo joga?',
    'sl': 'Jeśli już rozpocząć przygodę ze sportem, to tylko w okresie letnim! Przynajmniej ta pora będzie najbardziej odpowiednia dla Ciebie. Sprawdź, czy sporty typowo letnie będą dla Ciebie najlepsze – na przykład rolki, kolarstwo, frisbee, siatkówka plażowa, windsurfing, wakeboarding, tenis ziemny, nordic walking i inne.',
    'szi': 'Czy zima to Twoja ulubiona pora roku? Chyba tak, bo wygląda na to, że najbardziej interesują Cię sporty zimowe. Proponujemy więc, aby swoją przygodę ze sportem rozpoczął/rozpoczęła od dyscyplin takich, jak: narciarstwo, snowboarding, hokej na lodzie, łyżwiarstwo, saneczkarstwo.',
    'sw': 'Lubisz rywalizację i kontakt z drugim człowiekiem, masz też dużo energii, której nie masz gdzie spożytkować. Sporty walki, które możemy Ci zarekomendować to boks, karate, kickboxing, taekwondo, ju-jitsu, judo, zapasy. Sprawdź, które będą najlepsze dla Ciebie!',
    'se': 'Lubisz, kiedy poziom adrenaliny w Twojej krwi odrobinę się podwyższa, zaś z ryzykiem i brawurą jesteś za pan brat! Myślałeś/myślałaś kiedyś o przygodzie ze sportami ekstremalnymi, takimi jak: bungee jumping, skoki spadochronowe, wspinaczka, kajakarstwo górskie, rower górski, rajdy samochodowe i inne.',
    'swo': 'Lubisz kontakt z wodą – nie ważne czy w basenie, w jeziorze, czy na morzu! Sporty wodne to coś, co pewnie przypadnie Ci do gustu. Sprawdź na przykład pływanie, kajakarstwo, wioślarstwo, surfing, żeglarstwo, aqua-aerobic.',
    'sr': 'Lubisz spokój, wyciszenie i relaks. Nie przepadasz za intensywnym wysiłkiem, ale lubisz ruch. Rekreacja to coś dla Ciebie – spróbuj jogi, nordic walking, gimnastyka.'
};

const testQuestions = document.querySelectorAll('.test__question');
const testButtons = document.querySelectorAll('.test__answer-button');
let result = new Array;
let testIndex = 0;
let testAnimTime = 300;
let transition = `opacity ${testAnimTime}ms ease-in`;
// ustawienie transition dla każdego pytania
testQuestions.forEach(question => {
    question.style.transition = transition;
});

function showResult(aArr) {
    let keys = Object.keys(aArr);
    let biggestValue = 0;
    let biggestKey = new Array;
    let i = 0;
    let resultAnimTime = testAnimTime;
    keys.forEach((key) => {
        if (aArr[key] >= biggestValue) {
            if (aArr[key] > biggestValue) {
                biggestValue = aArr[key];
                biggestKey = new Array;
                i = 0;
                biggestKey[i] = key;
            }
            else {
                biggestKey[i++] = key;
            }
        }
    });
    i = 0;
    let paragraphs = new Array;
    biggestKey.forEach(key => {
        paragraphs[i] = document.createElement('p');
        paragraphs[i].classList.add('test__score-paragraph');
        paragraphs[i].innerHTML = summaries[key];
        document.querySelector('.test__score').appendChild(paragraphs[i]);
        paragraphs[i].style['transition'] = `opacity ${resultAnimTime}ms ease-in`;
        i < 4 ? resultAnimTime += testAnimTime : void 0;
        i++;
    });
    i = 0;
    resultAnimTime = testAnimTime;
    setTimeout(() => {
        document.querySelectorAll('.test__score-paragraph').forEach(paragraph => {
            if (i++ == 0) {
                paragraph.style.opacity = '1';
            }
            else {
                setTimeout(() => {
                    paragraph.style.opacity = '1';
                }, resultAnimTime);
                resultAnimTime += testAnimTime;
            }
        });
    }, 100);
    i = 0;
};
document.querySelector('.test__question--intro').style.display = 'block';
document.querySelector('.test__question--intro').style.transition = transition;
document.querySelector('.test__question--intro').style.opacity = '1';
document.querySelector('.test__question-enter').addEventListener('click', function () {
    document.querySelector('.test__question--intro').style.opacity = '0';
    setTimeout(() => {
        document.querySelector('.test__question--intro').style.removeProperty('display');
        testQuestions[testIndex].style.display = 'block';
        testQuestions[testIndex].style.opacity = '1';
    }, testAnimTime);
});

testButtons.forEach(button => {
    button.addEventListener('click', function () {
        let categories = this.dataset.testcategory.split(",");
        categories.forEach(cat => {
            testCategories[cat]++;
        });
        if (testQuestions[testIndex + 1] == undefined) {
            testQuestions[testIndex].style.opacity = '0';
            setTimeout(() => {
                testQuestions[testIndex].style.removeProperty('display');
                showResult(testCategories);
            }, testAnimTime);
        }
        else {
            testQuestions[testIndex].style.opacity = '0';
            setTimeout(() => {
                testQuestions[testIndex].style.removeProperty('display');
                testQuestions[++testIndex].style.display = 'block';
                testQuestions[testIndex].style.opacity = '1';
            }, testAnimTime);
        }
    });
});