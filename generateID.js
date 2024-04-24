const setrandomid = document.getElementById("random-id");
const setrandomid2 = document.getElementById("random-id2");

function generateRandomID(length) {
  const characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  let result = "";
  const charactersLength = characters.length;
  for (let i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return result;
}

const randomID = generateRandomID(12);

setrandomid.value = randomID;
setrandomid2.value = randomID;
