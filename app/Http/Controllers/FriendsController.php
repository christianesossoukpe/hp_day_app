<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FriendsController extends Controller {
    // fonctions pour recuperer les amis
    public function getFriends( $user_id ) {
        // recupere user à travers son id
        $user = User::findOrFail( $user_id );

        // recup amis avec status accepted
        $friends = $user->friends()->where( 'status', 'pending' )->get()
        ->merge( $user->friendOf()->where( 'status', 'accepted' )->get() );

        return response()->json( $friends );
        //reponse en json
    }

    // fonction d'envoi de demande d'amitié

    public function sendFriendRequest($user_id, $friend_id)
    {
        try {
            $user = User::findOrFail($user_id);
    
            if ($user->friends()->where('friend_id', $friend_id)->exists()) {
                return response()->json(['message' => 'Vous êtes déjà amis.'], 400);
            }
    
            $user->friends()->attach($friend_id, ['status' => 'pending']);
    
            return response()->json(['message' => 'Demande envoyée avec succès.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de l\'envoi de la demande.', 'error' => $e->getMessage()], 500);
        }
    }
    

// fonction de suggestion d'amis

            public function suggestFriends( $user_id ) {
                try {
                    // Récupère l'utilisateur courant
                    $user = User::findOrFail($user_id);
        
                    // Récupère les IDs des amis existants
                    $friendIds = $user->friends()->pluck('friend_id')->toArray();
        
                    // Ajoute l'ID de l'utilisateur lui-même pour l'exclure
                    $friendIds[] = $user_id;
        
                    // Récupère les utilisateurs qui ne sont pas encore amis
                    $suggestions = User::whereNotIn('id', $friendIds)->get();
        
                    // Retourne les suggestions d'amis
                    return response()->json(['suggestions' => $suggestions], 200);
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return response()->json(['error' => 'Utilisateur non trouvé.'], 404);
                } catch (\Exception $e) {
                    return response()->json(['error' => 'Erreur lors de la récupération des suggestions.'], 500);
                }
            }

            // fonction de recherche d'amis
            public function searchFriends(int $user_id, int $friend_id)
            {
                try {
                    // Récupérer l'utilisateur courant
                    $user = User::findOrFail($user_id);
            
                    // Vérifier si l'ami fait partie des amis de l'utilisateur
                    $friend = $user->friends()->where('friend_id', $friend_id)->first();
                    // Si l'ami n'est pas trouvé
                    if (!$friend) {
                        return response()->json(['message' => 'Ami non trouvé ou non ajouté.'], 404);
                    }
            
                    // Si l'ami est trouvé
                    return response()->json($friend);
                } catch (\Exception $e) {
                    // En cas d'exception, retourner une réponse d'erreur 500
                    return response()->json(['error' => 'Erreur lors de la récupération de l\'ami.', 'details' => $e->getMessage()], 500);
                }
            }
            
            

        // fonctions dacceptation de demande

        public function acceptFriendRequest($user_id, $friend_id) {
            // Récupérer l'utilisateur actuel
            $user = User::findOrFail($user_id);
        
            // Vérifier si une demande d'ami en attente existe
            $friendRequest = DB::table('friends')
                ->where('user_id', $friend_id) // Demande envoyée par l'ami, donc 'friend_id' en tant qu'utilisateur qui a envoyé
                ->where('friend_id', $user_id) // et 'user_id' est celui qui la reçoit
                ->where('status', 'pending')
                ->first();
        
            // Si la demande n'existe pas, retournez une erreur
            if (!$friendRequest) {
                return response()->json(['message' => 'Pas de requêtes en attente.'], 404);
            }
        
            // Mettre à jour le statut de la demande existante en 'accepted'
            DB::table('friends')
                ->where('user_id', $friend_id)
                ->where('friend_id', $user_id)
                ->update(['status' => 'accepted']);
        
            // Ajouter la relation réciproque
            DB::table('friends')->insertOrIgnore([
                'user_id' => $user_id,
                'friend_id' => $friend_id,
                'status' => 'accepted'
            ]);
        
            return response()->json(['message' => 'Demande acceptée avec succès.']);
        }
        
        
    }
