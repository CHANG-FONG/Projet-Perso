import java.util.ArrayList;
import java.util.List;

public class Deck {

	private List<uneCarte> lesCartes = new ArrayList<>();
	private List<uneCarte> extraMonstre;
	
	public Deck(List<uneCarte> lesCarte) {
		this.lesCartes = lesCarte;
		List<uneCarte> ExtraMonstre = new ArrayList<>();
		for(int i = 0; i<lesCartes.size(); i++) {
			if(lesCartes.get(i).getExtra() == "Synchro" || 
					lesCartes.get(i).getExtra() == "Fusion" ||
					lesCartes.get(i).getExtra() == "Xyz" ) {
				ExtraMonstre.add(lesCartes.get(i));
				lesCartes.remove(i);
			}
		}
		this.extraMonstre = ExtraMonstre;
	}

	public void removing(int i) {
		lesCartes.remove(i);
	}
	
//Getter..........................................................
	
	public List<uneCarte> getExtraMonstre() {
		return extraMonstre;
	}
	
	public uneCarte getCarteDeck(int i) {
		return lesCartes.get(i);
	}
	
	public List<uneCarte> getLesCartes() {
		return lesCartes;
	}
}
