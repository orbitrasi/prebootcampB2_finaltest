var arr = ["a", "l", "a", "g", "c", "g", "c", "d", "o", "d", "o", "l"];

function removeDup(data) {
    let unique = [];
    data.forEach(element => {
        if(!unique.includes(element)) {
            unique.push(element)
        }
    });

    return unique;
}
console.log("Input", arr);
console.log("output", removeDup(arr));