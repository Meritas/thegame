<div ng-controller="FightController as fcontrol">

<p>It's dark and a cold wind is blowing.</p>
<p>On this unfateful evening you've encountered {{ fcontrol.mobData.name }}</p>
<p>He seems to be in {{ console.log(mobData.mood) }} mood. </p>
<!-- <p> But it's maybe not that bad that you attacked him, because he seems to be a bad guy</p> -->
<button ng-click="fight_proceed()">Strike</button>
{{4}}
</div>