package AntlrStuff
{
	import com.xperiment.behaviour.BehaviourBoss;
	import com.xperiment.onScreenBoss.IOnScreenBoss;
	import flash.display.Sprite;
	
	public class BehaviourBossAntlr extends BehaviourBoss
	{
		public function BehaviourBossAntlr(bossSprite:Sprite, currentDisplay:IOnScreenBoss)
		{
			super(bossSprite, currentDisplay);
		}
	}
}