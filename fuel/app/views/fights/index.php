<div ng-controller="FightController as FightController">

<p>It's dark and a cold wind is blowing.</p>
<p>On this unfateful evening you've encountered {{ mobData.name }}</p>
<p>He seems to be in {{ mobData.mood}} mood. </p>
<!-- <p> But it's maybe not that bad that you attacked him, because he seems to be a bad guy</p> -->
<button ng-click="fight_proceed()">Strike</button>
</div>