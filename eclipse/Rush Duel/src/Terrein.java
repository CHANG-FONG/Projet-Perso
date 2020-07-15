import java.util.ArrayList;
import java.util.List;

public class Terrein {

	private uneCarte zoneMonstre1;
	private uneCarte zoneMonstre2;
	private uneCarte zoneMonstre3;
	private uneCarte zoneMagiePiege1;
	private uneCarte zoneMagiePiege2;
	private uneCarte zoneMagiePiege3;
	private uneCarte zoneMagieTerrein;
	private Deck leDeck;
	private Deck extraDeck;
	private Deck leCimetiere;
	private List<uneCarte> laMain = new ArrayList<>();
	
	public Terrein(Deck ceDeck) {
		this.zoneMagiePiege1 = null;
		this.zoneMagiePiege2 = null;
		this.zoneMagiePiege3 = null;
		this.zoneMonstre1 = null;
		this.zoneMonstre2 = null;
		this.zoneMonstre3 = null;
		this.zoneMagieTerrein = null;
		this.leCimetiere = null;
		this.leDeck = ceDeck;
		Deck lExtraDeck = new Deck(ceDeck.getExtraMonstre());
		this.extraDeck = lExtraDeck;
	}

	public void mainDebut() {
		for(int i = 0; i<4; i++) {
			laMain.add(leDeck.getCarteDeck(0));
			leDeck.removing(0);
		}
	}
	
	public void setCarte(uneCarte laCarte) {
		if(laCarte.getGenre() == "Monstre") {
			if(this.zoneMonstre1 == null) {
				this.zoneMonstre1 = laCarte;
			}else if(this.zoneMonstre2 == null) {
				this.zoneMonstre2 = laCarte;
			}else if(this.zoneMonstre2 == null) {
				this.zoneMonstre3 = laCarte;
			}
		}else if(laCarte.getExtra() == "Terrein") {
			if(this.zoneMagieTerrein == null) {
				this.zoneMagieTerrein = laCarte;
			}
		}else {
			if(this.zoneMagiePiege1 == null) {
				this.zoneMagiePiege1 = laCarte;
			}else if(this.zoneMagiePiege2 == null) {
				this.zoneMagiePiege2 = laCarte;
			}else if(this.zoneMagiePiege3 == null) {
				this.zoneMagiePiege3 = laCarte;
			}
		}
		
	}
//Getter et Setter......................................................
	
	public List<uneCarte> getLaMain() {
		return laMain;
	}

	public Deck getExtraDeck() {
		return extraDeck;
	}

	public uneCarte getZoneMonstre1() {
		return zoneMonstre1;
	}

	public uneCarte getZoneMagiePiege1() {
		return zoneMagiePiege1;
	}
	
}
