$(function () {
	let screenSize = $(document).width();
	let time = 3;
	let finished = false;

	function checkForPreviousGames() {
		let car1 = localStorage.getItem("car1time");
		let car2 = localStorage.getItem("car2time");
		let place1 = "first";
		let place2 = "first";
		if (!car1) {
			return;
		}
		$("#previous").show();
		if (car1 > car2) {
			place1 = "second";
		} else {
			place2 = "second";
		}
		$("#previous-results").append(`
		<h5 style="border: 2px solid white" class="p-2"><span class="white">Car1</span> finished in <span class="white">${place1}</span> place, with a time
					of <span class="white">${car1}</span> milliseconds</h5>
				<h5 style="border: 2px solid white" class="p-2"><span class="red">Car2</span> finished in <span class="red">${place2}</span> place, with a time
					of <span class="red">${car2}</span> milliseconds</h5>
		`);
	};

	function finishRace(time, timeOther, car) {
		$("#raceTrack").animate({ opacity: 0.5 });
		$("#finish").show();
		finished = true;
		$("#startOverBtn").attr("disabled", false);
		if (time < timeOther) {
			showResult(car, "first", time);
		} else {
			showResult(car, "second", time);
		}
	};

	function showResult(car, position, time) {
		let text = `<tr><td><h5 style="border: 2px solid white">Finished in: <span${car == 2 ? ' class="red"' : ' class="white"'}>${position}</span> place with a time of: <span${car == 2 ? ' class="red"' : ' class="white"'}>${time}</span> milliseconds.</h5></td></tr>`;
		$(`#car${car}Result`).append(text);
	}

	function createTime() {
		return Math.floor(Math.random() * (4000 - 3000) + 1) + 3000;
		// se generira broj pomegju 3000 i 4000 milisekundi
	}

	checkForPreviousGames()

	$("#raceBtn").click(() => {
		document.querySelector("#countdownAudio").play();
		$("#raceBtn").attr("disabled", true);
		$("#countdown").show();
		$("#timer").text(time);
		$("#raceTrack").animate({ opacity: 0.5 });
		let countdown = setInterval(() => {
			if (time == 1) {
				clearInterval(countdown);
				$("#countdown").hide();
				$("#raceTrack").animate({ opacity: 1 });
				time = 3;
			} else {
				--time;
				$("#timer").text(time);
			}
		}, 900); // intervalot e so 900ms samo zaradi countdownAudio. 
		setTimeout(() => {
			document.querySelector("#tyresAudio").play();
			let car1Time = createTime();
			let car2Time = createTime();
			$("#car1Img").animate({ left: `${screenSize - 230}px` }, car1Time, function () {
				finishRace(car1Time, car2Time, 1);
				localStorage.setItem("car1time", car1Time);
			});
			$("#car2Img").animate({ left: `${screenSize - 230}px` }, car2Time, function () {
				finishRace(car2Time, car1Time, 2);
				localStorage.setItem("car2time", car2Time);
			});
		}, 2700);
	});
	$("#startOverBtn").click(() => {
		if (finished) {
			document.querySelector("#backButtonAudio").play();
			$("#car1Img, #car2Img").animate({ left: 0 }, 200);
			$("#raceTrack").animate({ opacity: 1 });
			$("#finish").hide();
			$("#raceBtn").attr("disabled", false);
			finished = false;
			$("#startOverBtn").attr("disabled", true);
		}
	});

})
