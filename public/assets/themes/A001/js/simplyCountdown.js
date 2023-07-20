// !AKAD NIKAH
let dateDataCeremony = dateWeddingCeremony.split('-');
simplyCountdown('#countdown-ceremony', {
    year: parseInt(dateDataCeremony[0]), // required
    month: parseInt(dateDataCeremony[1]), // required
    day: parseInt(dateDataCeremony[2]), // required
    hours: 0, // Default is 0 [0-23] integer
    minutes: 0, // Default is 0 [0-59] integer
    seconds: 0, // Default is 0 [0-59] integer
    words: { //words displayed into the countdown
        days: { singular: 'Hari', plural: 'Hari' },
        hours: { singular: 'Jam', plural: 'Jam' },
        minutes: { singular: 'Menit', plural: 'Menit' },
        seconds: { singular: 'Detik', plural: 'Detik' }
    },
});

let dateDataReception = dateWeddingReception.split('-');
simplyCountdown('#countdown-reception', {
    year: parseInt(dateDataReception[0]), // required
    month: parseInt(dateDataReception[1]), // required
    day: parseInt(dateDataReception[2]), // required
    hours: 0, // Default is 0 [0-23] integer
    minutes: 0, // Default is 0 [0-59] integer
    seconds: 0, // Default is 0 [0-59] integer
    words: { //words displayed into the countdown
        days: { singular: 'Hari', plural: 'Hari' },
        hours: { singular: 'Jam', plural: 'Jam' },
        minutes: { singular: 'Menit', plural: 'Menit' },
        seconds: { singular: 'Detik', plural: 'Detik' }
    },
});