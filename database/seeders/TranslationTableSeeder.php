<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;

class TranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # home menu
        Translation::create([
            'slug' => 'pl_home',
            'value' => 'Home',
        ]);

        Translation::create([
            'slug' => 'sl_home',
            'value' => 'Home',
        ]);
        Translation::create([
            'slug' => 'pl_about',
            'value' => 'About',
        ]);

        Translation::create([
            'slug' => 'sl_about',
            'value' => 'À propos',
        ]);

        Translation::create([
            'slug' => 'pl_pages',
            'value' => 'Pages',
        ]);

        Translation::create([
            'slug' => 'sl_pages',
            'value' => 'Des pages',
        ]);
        Translation::create([
            'slug' => 'pl_team',
            'value' => 'Team',
        ]);

        Translation::create([
            'slug' => 'sl_team',
            'value' => 'Équipe',
        ]);
        Translation::create([
            'slug' => 'pl_blog',
            'value' => 'Blog',
        ]);

        Translation::create([
            'slug' => 'sl_blog',
            'value' => 'Blog',
        ]);

        Translation::create([
            'slug' => 'pl_contact',
            'value' => 'Contact',
        ]);

        Translation::create([
            'slug' => 'sl_contact',
            'value' => 'Contacter',
        ]);

        Translation::create([
            'slug' => 'pl_create_camp',
            'value' => 'Create Campaign',
        ]);

        Translation::create([
            'slug' => 'sl_create_camp',
            'value' => 'Créer une campagne',
        ]);

        # content
        Translation::create([
            'slug' => 'pl_campaign_title',
            'value' => 'Running Campaign',
        ]);

        Translation::create([
            'slug' => 'sl_campaign_title',
            'value' => 'Campagne en cours',
        ]);

        Translation::create([
            'slug' => 'pl_campaign_subtitle',
            'value' => 'It is a long established fact that a reader will be distracted by the readable content.',
        ]);

        Translation::create([
            'slug' => 'sl_campaign_subtitle',
            'value' => "C'est un fait établi depuis longtemps qu'un lecteur sera distrait par le contenu lisible.",
        ]);

        Translation::create([
            'slug' => 'pl_our_leader_title',
            'value' => 'Our Team Leaders',
        ]);

        Translation::create([
            'slug' => 'sl_our_leader_title',
            'value' => "Nos dirigeants",
        ]);

        Translation::create([
            'slug' => 'pl_our_leader_subtitle',
            'value' => 'It is a long established fact that a reader will be distracted by the readable content.',
        ]);

        Translation::create([
            'slug' => 'sl_our_leader_subtitle',
            'value' => "C'est un fait établi depuis longtemps qu'un lecteur sera distrait par le contenu lisible.",
        ]);

        Translation::create([
            'slug' => 'pl_feedback_title',
            'value' => 'Feedback From Doners',
        ]);

        Translation::create([
            'slug' => 'sl_feedback_title',
            'value' => "Commentaires des donateurs",
        ]);

        Translation::create([
            'slug' => 'pl_feedback_subtitle',
            'value' => 'It is a long established fact that a reader will be distracted by the readable content.',
        ]);

        Translation::create([
            'slug' => 'sl_feedback_subtitle',
            'value' => "C'est un fait établi depuis longtemps qu'un lecteur sera distrait par le contenu lisible.",
        ]);


        Translation::create([
            'slug' => 'pl_news_title',
            'value' => 'Latest News',
        ]);

        Translation::create([
            'slug' => 'sl_news_title',
            'value' => "Dernières nouvelles",
        ]);


        Translation::create([
            'slug' => 'pl_news_subtitle',
            'value' => 'It is a long established fact that a reader will be distracted by the readable content.',
        ]);

        Translation::create([
            'slug' => 'sl_news_subtitle',
            'value' => "C'est un fait établi depuis longtemps qu'un lecteur sera distrait par le contenu lisible.",
        ]);

        Translation::create([
            'slug' => 'pl_partner_title',
            'value' => 'Our Trusted Partners',
        ]);

        Translation::create([
            'slug' => 'sl_partner_title',
            'value' => "Nos partenaires de confiance",
        ]);

        Translation::create([
            'slug' => 'pl_partner_subtitle',
            'value' => 'It is a long established fact that a reader will be distracted by the readable content.',
        ]);

        Translation::create([
            'slug' => 'sl_partner_subtitle',
            'value' => "C'est un fait établi depuis longtemps qu'un lecteur sera distrait par le contenu lisible.",
        ]);

        # about page


        Translation::create([
            'slug' => 'pl_about_us_title',
            'value' => 'About us'
        ]);

        Translation::create([
            'slug' => 'sl_about_us_title',
            'value' => 'About us'
        ]);

        Translation::create([
            'slug' => 'pl_our_journey_title',
            'value' => 'Our Journey'
        ]);
        Translation::create([
            'slug' => 'sl_our_journey_title',
            'value' => ''
        ]);

        Translation::create([
            'slug' => 'pl_our_journey_subtitle',
            'value' => 'It is a long established fact that a reader will be distracted by the readable content.'
        ]);
        Translation::create([
            'slug' => 'sl_our_journey_subtitle',
            'value' => "C'est un fait établi depuis longtemps qu'un lecteur sera distrait par le contenu lisible."
        ]);

        Translation::create([
            'slug' => 'pl_first_stage',
            'value' => 'First Stage'
        ]);
        Translation::create([
            'slug' => 'sl_first_stage',
            'value' => 'First Stage'
        ]);

        Translation::create([
            'slug' => 'pl_second_stage',
            'value' => 'Second Stage'
        ]);
        Translation::create([
            'slug' => 'sl_second_stage',
            'value' => 'Second Stage'
        ]);

        Translation::create([
            'slug' => 'pl_third_stage',
            'value' => 'Third Stage'
        ]);
        Translation::create([
            'slug' => 'sl_third_stage',
            'value' => 'Third Stage'
        ]);

        Translation::create([
            'slug' => 'pl_fourth_stage',
            'value' => 'Fourth Stage'
        ]);
        Translation::create([
            'slug' => 'sl_fourth_stage',
            'value' => 'Fourth Stage'
        ]);

        Translation::create([
            'slug' => 'pl_fifth_stage',
            'value' => 'Fifth Stage'
        ]);
        Translation::create([
            'slug' => 'sl_fifth_stage',
            'value' => 'Fifth Stage'
        ]);

        # Blog page

        Translation::create([
            'slug' => 'pl_blog_page_title',
            'value' => 'Blog Page'
        ]);
        Translation::create([
            'slug' => 'sl_blog_page_title',
            'value' => 'Fifth Stage'
        ]);

        Translation::create([
            'slug' => 'pl_post_categories',
            'value' => 'Post Categories'
        ]);
        Translation::create([
            'slug' => 'sl_post_categories',
            'value' => 'Post Categories'
        ]);

        Translation::create([
            'slug' => 'pl_popular_post',
            'value' => 'Popular Post'
        ]);
        Translation::create([
            'slug' => 'sl_popular_post',
            'value' => 'Popular Post'
        ]);

        Translation::create([
            'slug' => 'pl_post_tag',
            'value' => 'Post Tag'
        ]);
        Translation::create([
            'slug' => 'sl_post_tag',
            'value' => 'Post Tag'
        ]);


        Translation::create([
            'slug' => 'pl_search_keywords',
            'value' => 'Search yor keywords'
        ]);
        Translation::create([
            'slug' => 'sl_search_keywords',
            'value' => 'Search yor keywords'
        ]);

        # signin signup

        Translation::create([
            'slug' => 'pl_first_name',
            'value' => 'First Name'
        ]);
        Translation::create([
            'slug' => 'sl_first_name',
            'value' => 'Prénom'
        ]);

        Translation::create([
            'slug' => 'pl_last_name',
            'value' => 'Last Name'
        ]);
        Translation::create([
            'slug' => 'sl_last_name',
            'value' => 'Nom de famille'
        ]);

        Translation::create([
            'slug' => 'pl_email',
            'value' => 'Email'
        ]);
        Translation::create([
            'slug' => 'sl_email',
            'value' => 'E-mail'
        ]);

        Translation::create([
            'slug' => 'pl_phone',
            'value' => 'Mobile Numner'
        ]);
        Translation::create([
            'slug' => 'sl_phone',
            'value' => 'Numéro de portable'
        ]);

        Translation::create([
            'slug' => 'pl_password',
            'value' => 'Password'
        ]);
        Translation::create([
            'slug' => 'sl_password',
            'value' => 'Mot de passe'
        ]);

        Translation::create([
            'slug' => 'pl_repeat_password',
            'value' => 'Repeat Password'
        ]);
        Translation::create([
            'slug' => 'sl_repeat_password',
            'value' => 'Répéter le mot de passe'
        ]);

        Translation::create([
            'slug' => 'pl_read_t_c',
            'value' => 'I read the terms of conditions and agreed with this.'
        ]);
        Translation::create([
            'slug' => 'sl_read_t_c',
            'value' => "J'ai lu les conditions générales et je suis d'accord avec cela."
        ]);

        Translation::create([
            'slug' => 'pl_create_account',
            'value' => 'Create Account'
        ]);
        Translation::create([
            'slug' => 'sl_create_account',
            'value' => "Créer un compte"
        ]);

        Translation::create([
            'slug' => 'pl_have_account',
            'value' => 'Already have account'
        ]);
        Translation::create([
            'slug' => 'sl_have_account',
            'value' => "Vous avez déjà un compte"
        ]);

        Translation::create([
            'slug' => 'pl_signin',
            'value' => 'Sign In'
        ]);
        Translation::create([
            'slug' => 'sl_signin',
            'value' => "S'identifier"
        ]);

        Translation::create([
            'slug' => 'pl_remember_me',
            'value' => 'Remember me'
        ]);
        Translation::create([
            'slug' => 'sl_remember_me',
            'value' => "Souviens-toi de moi"
        ]);

        Translation::create([
            'slug' => 'pl_forget_password',
            'value' => 'Forget Password'
        ]);
        Translation::create([
            'slug' => 'sl_forget_password',
            'value' => "Mot de passe oublié"
        ]);

        Translation::create([
            'slug' => 'pl_havent_account',
            'value' => 'Don’t have any account'
        ]);
        Translation::create([
            'slug' => 'sl_havent_account',
            'value' => "Je n'ai pas de compte"
        ]);

        Translation::create([
            'slug' => 'pl_signup',
            'value' => 'Sign Up'
        ]);
        Translation::create([
            'slug' => 'sl_signup',
            'value' => "S'inscrire"
        ]);

        Translation::create([
            'slug' => 'pl_welcome_title',
            'value' => 'Welcome to Join with us'
        ]);
        Translation::create([
            'slug' => 'sl_welcome_title',
            'value' => "Bienvenue à Rejoignez-nous"
        ]);

        Translation::create([
            'slug' => 'pl_welcome_subtitle',
            'value' => 'Tellus vitae amet id in. Nec mi iaculis eget ut. Quis cursus vel eget gravida elit malesuada.'
        ]);
        Translation::create([
            'slug' => 'sl_welcome_subtitle',
            'value' => "Tellus vitae amet id in. Nec mi iaculis eget ut. Quis cursus vel eget gravida elit malesuada."
        ]);

        Translation::create([
            'slug' => 'pl_message',
            'value' => 'Message'
        ]);
        Translation::create([
            'slug' => 'sl_message',
            'value' => "Un message"
        ]);

        Translation::create([
            'slug' => 'pl_send',
            'value' => 'Send'
        ]);
        Translation::create([
            'slug' => 'sl_send',
            'value' => "Envoyer le"
        ]);

        # pages

        Translation::create([
            'slug' => 'pl_signup',
            'value' => 'Sign Up'
        ]);
        Translation::create([
            'slug' => 'sl_signup',
            'value' => "S'inscrire"
        ]);

        Translation::create([
            'slug' => 'pl_signin',
            'value' => 'Sign In'
        ]);
        Translation::create([
            'slug' => 'sl_signin',
            'value' => "S'identifier"
        ]);

        Translation::create([
            'slug' => 'pl_campaign',
            'value' => 'Campaigns'
        ]);
        Translation::create([
            'slug' => 'sl_campaign',
            'value' => "Campagne"
        ]);

        Translation::create([
            'slug' => 'pl_dashboard',
            'value' => 'Dashboard'
        ]);
        Translation::create([
            'slug' => 'sl_dashboard',
            'value' => "Tableau de bord"
        ]);

        Translation::create([
            'slug' => 'pl_my_campaign',
            'value' => 'My Campaigns'
        ]);
        Translation::create([
            'slug' => 'sl_my_campaign',
            'value' => "Ma campagne"
        ]);

        Translation::create([
            'slug' => 'pl_payment',
            'value' => 'Payment'
        ]);
        Translation::create([
            'slug' => 'sl_payment',
            'value' => "Paiement"
        ]);

        Translation::create([
            'slug' => 'pl_withdraw',
            'value' => 'Withdraw'
        ]);
        Translation::create([
            'slug' => 'sl_withdraw',
            'value' => "Retirer"
        ]);

        # user dashboard

        Translation::create([
            'slug' => 'pl_active',
            'value' => 'Active'
        ]);
        Translation::create([
            'slug' => 'sl_active',
            'value' => "Actif"
        ]);
        Translation::create([
            'slug' => 'pl_deactive',
            'value' => 'Deactive'
        ]);
        Translation::create([
            'slug' => 'sl_deactive',
            'value' => "Désactiver"
        ]);
        Translation::create([
            'slug' => 'pl_suspend',
            'value' => 'Suspend'
        ]);
        Translation::create([
            'slug' => 'sl_suspend',
            'value' => "Suspendre"
        ]);
        Translation::create([
            'slug' => 'pl_male',
            'value' => 'Male'
        ]);
        Translation::create([
            'slug' => 'sl_male',
            'value' => "Mâle"
        ]);
        Translation::create([
            'slug' => 'pl_female',
            'value' => 'Female'
        ]);
        Translation::create([
            'slug' => 'sl_female',
            'value' => "Femelle"
        ]);
        Translation::create([
            'slug' => 'pl_other',
            'value' => 'Other'
        ]);
        Translation::create([
            'slug' => 'sl_other',
            'value' => "Autre"
        ]);
        Translation::create([
            'slug' => 'pl_profile',
            'value' => 'Profile'
        ]);
        Translation::create([
            'slug' => 'sl_profile',
            'value' => "Profil"
        ]);
        Translation::create([
            'slug' => 'pl_gender',
            'value' => 'Gender'
        ]);
        Translation::create([
            'slug' => 'sl_gender',
            'value' => "Genre"
        ]);
        Translation::create([
            'slug' => 'pl_address',
            'value' => 'Address'
        ]);
        Translation::create([
            'slug' => 'sl_address',
            'value' => "Adresse"
        ]);
        Translation::create([
            'slug' => 'pl_country',
            'value' => 'Country'
        ]);
        Translation::create([
            'slug' => 'sl_country',
            'value' => "Pays"
        ]);
        Translation::create([
            'slug' => 'pl_member_since',
            'value' => 'Member Since'
        ]);
        Translation::create([
            'slug' => 'sl_member_since',
            'value' => "Membre depuis"
        ]);
        Translation::create([
            'slug' => 'pl_status',
            'value' => 'Status'
        ]);
        Translation::create([
            'slug' => 'sl_status',
            'value' => "Statut"
        ]);
        Translation::create([
            'slug' => 'pl_contributed',
            'value' => 'Contributed'
        ]);
        Translation::create([
            'slug' => 'sl_contributed',
            'value' => "Contributed"
        ]);
        Translation::create([
            'slug' => 'pl_account_deactivation',
            'value' => 'Account Deactivation'
        ]);
        Translation::create([
            'slug' => 'sl_account_deactivation',
            'value' => "Désactivation du compte"
        ]);
        Translation::create([
            'slug' => 'pl_deactive_account',
            'value' => 'Deactive My Account'
        ]);
        Translation::create([
            'slug' => 'sl_deactive_account',
            'value' => "Désactiver mon compte"
        ]);
        Translation::create([
            'slug' => 'pl_change_password',
            'value' => 'Change Password'
        ]);
        Translation::create([
            'slug' => 'sl_change_password',
            'value' => "Change Password"
        ]);

        # campaign

        Translation::create([
            'slug' => 'pl_start_campaign',
            'value' => 'Start Campaign'
        ]);
        Translation::create([
            'slug' => 'sl_start_campaign',
            'value' => "Lancer la campagne"
        ]);
        Translation::create([
            'slug' => 'pl_pending_campaign',
            'value' => 'Pending Campaign'
        ]);
        Translation::create([
            'slug' => 'sl_pending_campaign',
            'value' => "Campagne en attente"
        ]);
        Translation::create([
            'slug' => 'pl_backed_campaign',
            'value' => 'Backed Campaign'
        ]);
        Translation::create([
            'slug' => 'sl_backed_campaign',
            'value' => "Campagne soutenue"
        ]);
        Translation::create([
            'slug' => 'pl_title',
            'value' => 'Title'
        ]);
        Translation::create([
            'slug' => 'sl_title',
            'value' => "Titre"
        ]);
        Translation::create([
            'slug' => 'pl_details',
            'value' => 'Details'
        ]);
        Translation::create([
            'slug' => 'sl_details',
            'value' => "Des détails"
        ]);
        Translation::create([
            'slug' => 'pl_goal',
            'value' => 'Goal'
        ]);
        Translation::create([
            'slug' => 'sl_goal',
            'value' => "But"
        ]);
        Translation::create([
            'slug' => 'pl_raised',
            'value' => 'Raised'
        ]);
        Translation::create([
            'slug' => 'sl_raised',
            'value' => "Soulevé"
        ]);
        Translation::create([
            'slug' => 'pl_prefilled_amount',
            'value' => 'Amount Prefilled'
        ]);
        Translation::create([
            'slug' => 'sl_prefilled_amount',
            'value' => "Montant pré-rempli"
        ]);
        Translation::create([
            'slug' => 'pl_campaign_method',
            'value' => 'Campaign end Method'
        ]);
        Translation::create([
            'slug' => 'sl_campaign_method',
            'value' => "Méthode de fin de campagne"
        ]);
        Translation::create([
            'slug' => 'pl_start_date',
            'value' => 'Start Date'
        ]);
        Translation::create([
            'slug' => 'sl_start_date',
            'value' => "Start Date"
        ]);
        Translation::create([
            'slug' => 'pl_end_date',
            'value' => 'End Date'
        ]);
        Translation::create([
            'slug' => 'sl_end_date',
            'value' => "Date de fin"
        ]);
        Translation::create([
            'slug' => 'pl_video',
            'value' => 'Video url'
        ]);
        Translation::create([
            'slug' => 'sl_video',
            'value' => "URL de la vidéo"
        ]);
        Translation::create([
            'slug' => 'pl_address',
            'value' => 'Address'
        ]);
        Translation::create([
            'slug' => 'sl_address',
            'value' => "Adresse"
        ]);
        Translation::create([
            'slug' => 'pl_featured_image',
            'value' => 'Featured Image'
        ]);
        Translation::create([
            'slug' => 'sl_featured_image',
            'value' => "L'image sélectionnée"
        ]);
        Translation::create([
            'slug' => 'pl_submit',
            'value' => 'Submit'
        ]);
        Translation::create([
            'slug' => 'sl_submit',
            'value' => "Soumettre"
        ]);

        # required field

        Translation::create([
            'slug' => 'pl_required_field',
            'value' => 'This field must not be empty'
        ]);
        Translation::create([
            'slug' => 'sl_required_field',
            'value' => "Ce champ ne doit pas être vide"
        ]);

        Translation::create(['slug' => 'pl_running_campaign', 'value' => 'Running Campaign' ]);
        Translation::create(['slug' => 'sl_running_campaign','value' => "Campagne en cours" ]);

        Translation::create(['slug' => 'pl_active_campaign', 'value' => 'Active Campaign' ]);
        Translation::create(['slug' => 'sl_active_campaign','value' => "Campagne active" ]);

        Translation::create(['slug' => 'pl_campaign_info', 'value' => 'Campaign Info' ]);
        Translation::create(['slug' => 'sl_campaign_info','value' => "Informations sur la campagne" ]);

        Translation::create(['slug' => 'pl_document', 'value' => 'Documents' ]);
        Translation::create(['slug' => 'sl_document','value' => "Documents" ]);

        Translation::create(['slug' => 'pl_image', 'value' => 'Image' ]);
        Translation::create(['slug' => 'sl_image','value' => "Image" ]);

        Translation::create(['slug' => 'pl_edit_view', 'value' => 'Edit' ]);
        Translation::create(['slug' => 'sl_edit_view','value' => "Modifier" ]);


        Translation::create(['slug' => 'pl_after_goal_achieve', 'value' => 'After goal achieve' ]);
        Translation::create(['slug' => 'sl_after_goal_achieve','value' => "Après objectif atteindre" ]);

        Translation::create(['slug' => 'pl_after_end_date', 'value' => 'After end Date' ]);
        Translation::create(['slug' => 'sl_after_end_date','value' => "Après la date de fin" ]);

        # header & footer
        Translation::create(['slug' => 'pl_logout', 'value' => 'Logout' ]);
        Translation::create(['slug' => 'sl_logout','value' => "Se déconnecter" ]);

        Translation::create(['slug' => 'pl_subscribe_now', 'value' => 'Subscribe Now' ]);
        Translation::create(['slug' => 'sl_subscribe_now','value' => "Abonnez-vous maintenant" ]);

        Translation::create(['slug' => 'pl_right_reserved', 'value' => 'All Right Reserved By' ]);
        Translation::create(['slug' => 'sl_right_reserved','value' => "Tous droits réservés par" ]);

        Translation::create(['slug' => 'pl_quick_link', 'value' => 'Quick Link' ]);
        Translation::create(['slug' => 'sl_quick_link','value' => "Lien rapide" ]);

        Translation::create(['slug' => 'pl_contact_info', 'value' => 'Contact Info' ]);
        Translation::create(['slug' => 'sl_contact_info','value' => "Contact Info" ]);

        # index
        Translation::create(['slug' => 'pl_donate_now', 'value' => 'Donate Now' ]);
        Translation::create(['slug' => 'sl_donate_now','value' => "Faire un don maintenant" ]);

        Translation::create(['slug' => 'pl_become_doner', 'value' => 'Become Doner' ]);
        Translation::create(['slug' => 'sl_become_doner','value' => "Devenir Donateur" ]);

        Translation::create(['slug' => 'pl_view_more', 'value' => 'View More' ]);
        Translation::create(['slug' => 'sl_view_more','value' => "View More" ]);

        # Profile
        Translation::create(['slug' => 'pl_old_password', 'value' => 'Old Password' ]);
        Translation::create(['slug' => 'sl_old_password','value' => "ancien mot de passe" ]);

        Translation::create(['slug' => 'pl_new_password', 'value' => 'New Password' ]);
        Translation::create(['slug' => 'sl_new_password','value' => "ancien mot de passe" ]);

        Translation::create(['slug' => 'pl_update', 'value' => 'Update' ]);
        Translation::create(['slug' => 'sl_update','value' => "Mettre à jour" ]);

        Translation::create(['slug' => 'pl_total_collection', 'value' => 'Total Collection' ]);
        Translation::create(['slug' => 'sl_total_collection','value' => "Collecte totale" ]);

        Translation::create(['slug' => 'pl_collection_this_week', 'value' => 'Collection this Week' ]);
        Translation::create(['slug' => 'sl_collection_this_week','value' => "Collection cette semaine" ]);

        Translation::create(['slug' => 'pl_action', 'value' => 'Action' ]);
        Translation::create(['slug' => 'sl_action','value' => "Action" ]);

        Translation::create(['slug' => 'pl_category', 'value' => 'Category' ]);
        Translation::create(['slug' => 'sl_category','value' => "Catégorie" ]);

        Translation::create(['slug' => 'pl_select', 'value' => 'Select' ]);
        Translation::create(['slug' => 'sl_select','value' => "Sélectionner" ]);

        Translation::create(['slug' => 'pl_upload_campaign_mage', 'value' => 'Upload Campaign Featured Image' ]);
        Translation::create(['slug' => 'sl_upload_campaign_mage','value' => "Télécharger l'image en vedette de la campagne" ]);

        Translation::create(['slug' => 'pl_upload_document', 'value' => 'Upload Campaign Document' ]);
        Translation::create(['slug' => 'sl_upload_document','value' => "Télécharger le document de campagne" ]);

        Translation::create(['slug' => 'pl_service_charge', 'value' => 'Service Charge' ]);
        Translation::create(['slug' => 'sl_service_charge','value' => "Frais de service" ]);

        Translation::create(['slug' => 'pl_total_service_charge', 'value' => 'Total Service Charge' ]);
        Translation::create(['slug' => 'sl_total_service_charge','value' => "Frais de service totaux" ]);

        Translation::create(['slug' => 'pl_paypal_account', 'value' => 'Paypal Account' ]);
        Translation::create(['slug' => 'sl_paypal_account','value' => "Compte Paypal" ]);

        Translation::create(['slug' => 'pl_stripe_account', 'value' => 'Stripe Account' ]);
        Translation::create(['slug' => 'sl_stripe_account','value' => "Compte Stripe" ]);

        Translation::create(['slug' => 'pl_category_not_exists', 'value' => "Category doesn't exists" ]);
        Translation::create(['slug' => 'sl_category_not_exists','value' => "La catégorie n'existe pas" ]);

        Translation::create(['slug' => 'pl_back', 'value' => "Back" ]);
        Translation::create(['slug' => 'sl_back','value' => "Dos" ]);

        Translation::create(['slug' => 'pl_withdraw_method', 'value' =>'Withdraw Method' ]);
        Translation::create(['slug' => 'sl_withdraw_method','value' => "Méthode de retrait" ]);

        Translation::create(['slug' => 'pl_withdraw_pending', 'value' =>'Pending' ]);
        Translation::create(['slug' => 'sl_withdraw_pending','value' => "En attente" ]);

        Translation::create(['slug' => 'pl_withdraw_success', 'value' =>'Success' ]);
        Translation::create(['slug' => 'sl_withdraw_success','value' => "Succès" ]);

        # campaign detais

        Translation::create(['slug' => 'pl_campaign_details', 'value' =>'Campaign details' ]);
        Translation::create(['slug' => 'sl_campaign_details','value' => "Détails de la campagne" ]);

        Translation::create(['slug' => 'pl_comment_here', 'value' =>'Write comment here' ]);
        Translation::create(['slug' => 'sl_comment_here','value' => "Écrivez un commentaire ici" ]);

        Translation::create(['slug' => 'pl_comment', 'value' =>'Comment' ]);
        Translation::create(['slug' => 'sl_comment','value' => "Commenter" ]);

        Translation::create(['slug' => 'pl_created_on', 'value' =>'Created on' ]);
        Translation::create(['slug' => 'sl_created_on','value' => "Créé sur" ]);

        Translation::create(['slug' => 'pl_donars', 'value' =>'Doners' ]);
        Translation::create(['slug' => 'sl_donars','value' => "Donateur" ]);

        Translation::create(['slug' => 'pl_copy', 'value' =>'Copy' ]);
        Translation::create(['slug' => 'sl_copy','value' => "Copie" ]);

        Translation::create(['slug' => 'pl_seletc_gender', 'value' =>'Select Gender' ]);
        Translation::create(['slug' => 'sl_seletc_gender','value' => "Sélectionnez le sexe" ]);

        Translation::create(['slug' => 'pl_make_donate', 'value' =>'Make a donate' ]);
        Translation::create(['slug' => 'sl_make_donate','value' => "Faire un don" ]);

        Translation::create(['slug' => 'pl_how_much', 'value' =>'How much you want to pay' ]);
        Translation::create(['slug' => 'sl_how_much','value' => "Combien voulez-vous payer" ]);

        Translation::create(['slug' => 'pl_select_doanate_method', 'value' =>'Select the desired Donate  method' ]);
        Translation::create(['slug' => 'sl_select_doanate_method','value' => "Sélectionnez la méthode de don souhaitée" ]);

        Translation::create(['slug' => 'pl_currency', 'value' =>'Currency' ]);
        Translation::create(['slug' => 'sl_currency','value' => "Devise" ]);

        Translation::create(['slug' => 'pl_donate', 'value' =>'Donate' ]);
        Translation::create(['slug' => 'sl_donate','value' => "Faire un don" ]);

        Translation::create(['slug' => 'pl_donation', 'value' =>'Donation' ]);
        Translation::create(['slug' => 'sl_donation','value' => "don" ]);

        Translation::create(['slug' => 'pl_card_number', 'value' =>'Card Number' ]);
        Translation::create(['slug' => 'sl_card_number','value' => "Numéro de carte" ]);

        Translation::create(['slug' => 'pl_name', 'value' =>'Name' ]);
        Translation::create(['slug' => 'sl_name','value' => "Nom" ]);

        Translation::create(['slug' => 'pl_amount', 'value' =>'Amount' ]);
        Translation::create(['slug' => 'sl_amount','value' => "Montant" ]);

        Translation::create(['slug' => 'pl_exp_date', 'value' =>'Expired date' ]);
        Translation::create(['slug' => 'sl_exp_date','value' => "Date d'expiration" ]);

        Translation::create(['slug' => 'pl_exp_month', 'value' =>'Month' ]);
        Translation::create(['slug' => 'sl_exp_month','value' => "Mois" ]);

        Translation::create(['slug' => 'pl_exp_year', 'value' =>'Year' ]);
        Translation::create(['slug' => 'sl_exp_year','value' => "An" ]);

        Translation::create(['slug' => 'pl_read_more', 'value' =>'Read more' ]);
        Translation::create(['slug' => 'sl_read_more','value' => "Read More" ]);

        Translation::create(['slug' => 'pl_blog_details', 'value' =>'Blog Details' ]);
        Translation::create(['slug' => 'sl_blog_details','value' => "Détails du blog" ]);

        Translation::create(['slug' => 'pl_author', 'value' =>'Author' ]);
        Translation::create(['slug' => 'sl_author','value' => "Auteur" ]);

        Translation::create(['slug' => 'pl_related_blog', 'value' =>'Related Blog Post' ]);
        Translation::create(['slug' => 'sl_related_blog','value' => "Article de blog connexe" ]);

        Translation::create(['slug' => 'pl_select_category', 'value' =>'Select Category' ]);
        Translation::create(['slug' => 'sl_select_category','value' => "Choisir une catégorie" ]);

        Translation::create(['slug' => 'pl_send_message', 'value' =>'Send Message' ]);
        Translation::create(['slug' => 'sl_send_message','value' => "Envoyer le message" ]);




    }
}

/*

# profile -> Dashboard






# footer


 = All Right Reserved By

# index










*/
